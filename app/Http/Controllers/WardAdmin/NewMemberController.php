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
use App\Http\Requests\WardAdmin\NewMemberRequest;

class NewMemberController extends Controller
{

    public $fileUploadService;
    public function __construct(FileUploadService $fileUploadService) {
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         // Get the 'total' query parameter from the request
        $total = $request->query('total', 10); // Default to 10 if not provided

        setPageMeta('Member List');
        $customers = Customer::latest()
        ->with(['division'])
        ->paginate($total);
          // Append the 'total' query parameter to the pagination links
        $customers->appends(['total' => $total]);
        return view('word-admin.new-members.index',compact('customers','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        setPageMeta('Add New Member');
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
    public function store(NewMemberRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $customerData = $request->only([
                'card_no',
                'duration_year',
                'name',
                'father_name',
                'mother_name',
                'date_of_birth',
                'nid_number',
                'gender',
                'religion',
                'occupation',
                'division_id',
                'district_id',
                'upozila_id',
                'union_id',
                'ward',
                'post_code',
                'phone',
                'status',
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
            $customerData['user_id'] = auth()->user()->id;
            $customer = Customer::create($customerData);
            // dd('customer', $customer);
            if(isset($data['family_members'])){

                $customer->family_members()->createMany($request->family_members);
            }

            DB::commit();
            return redirect()->back()->with('success','New Member Created Successfully');
        } catch (\Exception $e) {
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
        setPageMeta('Edit New Member');
        $customer =  Customer::query()
        ->with(['family_members'])
        ->find($id);
        $data = [
            'division' => Division::all(),
            'district' => District::where('division_id',$customer->division_id)->select('id','name')->get(),
            'upazila' => Upazila::where('district_id',$customer->district_id)->select('id','name')->get(),
            'union' => Union::where('upazilla_id',$customer->upazila_id)->select('id','name')->get(),
            'ward' => Ward::where('union_id',$customer->union_id)->select('id','name')->get(),
            'data' =>$customer
        ];
        // dd($data);
        return view('word-admin.new-members.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewMemberRequest $request, string $id)
    {
        $data = $request->validated();
        // dd('$data', $data);
        try {
            DB::beginTransaction();

            $customer =  Customer::query()
            ->with(['family_members'])
            ->find($id);

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
                'upozila_id',
                'union_id',
                'ward',
                'status',
            ]);

            if(isset($request->avatar)){
                $customerData['avatar'] = $this->fileUploadService->uploadFile($request,'avatar',FILE_STORE_PATH,$customer->avatar);
            }

            if(isset($request->nid_front)){
                $customerData['nid_front'] = $this->fileUploadService->uploadFile($request,'nid_front',FILE_STORE_PATH,$customer->nid_front);
            }
            if(isset($request->nid_back)){
                $customerData['nid_back'] = $this->fileUploadService->uploadFile($request,'nid_back',FILE_STORE_PATH,$customer->nid_back);
            }
            $customerData['user_id'] = auth()->user()->id;
            $customer = Customer::updateOrCreate(['id'=>$id],$customerData);

            if(isset($data['family_members'])){
                $customer->family_members()->delete();
                $customer->family_members()->createMany($request->family_members);
            }

            DB::commit();
            return redirect()->route('ward.new-members.index')->with('success','New Member Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors',$e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer =  Customer::query()
            ->with(['family_members'])
            ->find($id);
        if(!is_null($customer->avatar)){
            $this->fileUploadService->delete($customer->avatar);
        }
        if(!is_null($customer->nid_front)){
            $this->fileUploadService->delete($customer->nid_front);
        }
        if(!is_null($customer->nid_back)){
            $this->fileUploadService->delete($customer->nid_back);
        }
        $customer->family_members()->delete();
        $customer->delete();
        return redirect()->route('ward.new-members.index')->with('success','New Member Deleted Successfully');
    }
}
