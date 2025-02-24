<?php

namespace App\Http\Controllers\WardAdmin;

use App\Models\Ward;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\Customer;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FileUploadService;
use App\Http\Controllers\Controller;

class NewMemberController extends Controller
{

    public $fileUploadService;
    public function __construct(FileUploadService $fileUploadService) {
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $customers = Customer::latest()->get();
        return view('word-admin.new-members.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
        ];
        return view('word-admin.new-members.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $customerData = $request->only([
                'name',
                'father_name',
                'mother_name',
                'date_of_birth',
                'nid_number',
                'phone',
                'gender',
                'religion',
                'occupation',
                'division_id',
                'district_id',
                'upozila',
                'union',
                'ward',
            ]);
            // dd($customerData, $request->all());
            if(isset($request->avatar)){
                $customerData['avatar'] = $this->fileUploadService->uploadFile($request,'avatar',FILE_STORE_PATH);
            }

            if(isset($request->nid_front)){
                $customerData['nid_front'] = $this->fileUploadService->uploadFile($request,'nid_front',FILE_STORE_PATH);
            }
            if(isset($request->nid_back)){
                $customerData['nid_back'] = $this->fileUploadService->uploadFile($request,'nid_back',FILE_STORE_PATH);
            }
            $customer = Customer::create($customerData);
            $customer->family_members()->createMany($request->family_members);

            DB::commit();
            return redirect()->route('ward.new-members.index')->with('success','New Member Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('errors',$e->getMessage());

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
