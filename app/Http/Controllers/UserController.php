<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ward;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use App\Services\SMSService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{

    public function userList()
    {
        $data = [
            'users' => User::all(),
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
        ];

        return view('user.index', $data);
    }

    public function index()
    {
        $data = [
            'users' => User::all(),
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
        ];

        return view('user.show', $data);
    }

    public function create(){
        setPageMeta('User Create');

        $data = [
            'users' => User::all(),
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
        ];
        // $upazila_admins = User::where('role', User::USER_ROLE_UPO_ADMIN)->where('status', User::STATUS_APPROVED)
        // ->select(['id','name'])
        // ->get();
        $district_admins = User::where('role', User::USER_ROLE_DIS_ADMIN)->where('status', User::STATUS_APPROVED)
        ->select(['id','name'])
        ->get();

        return view('SuperAdmin.user.create',compact('district_admins'), $data);
    }


    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'father' => 'nullable|string|max:255',
            'nid' => 'nullable|string|max:20',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'upazila_id' => 'nullable|exists:upazilas,id',
            'union_id' => 'nullable|exists:unions,id',
            'ward' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
            'nid_front' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
            'nid_back' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
            'certificate' => 'nullable|file|mimes:pdf,doc,docx',
            'password' => 'required|string|min:8',
        ]);

        // dd($request->all());


        $banglaToEnglishMonths = [
            "জানুয়ারি" => "01",
            "ফেব্রুয়ারি" => "02",
            "মার্চ" => "03",
            "এপ্রিল" => "04",
            "মে" => "05",
            "জুন" => "06",
            "জুলাই" => "07",
            "আগস্ট" => "08",
            "সেপ্টেম্বর" => "09",
            "অক্টোবর" => "10",
            "নভেম্বর" => "11",
            "ডিসেম্বর" => "12"
        ];

        $englishMonth = $banglaToEnglishMonths[$request['month']];
        $formattedDate = $request['year'] . '-' . $englishMonth . '-' . str_pad($request['day'], 2, '0', STR_PAD_LEFT);
        $data = new User();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/photos'), $image_name);
            $data->photo = 'upload/photos/' . $image_name;
        }

        // Handle NID front upload
        if ($request->hasFile('nid_front')) {
            $nid_front = $request->file('nid_front');
            $nid_front_name = hexdec(uniqid()) . '.' . $nid_front->getClientOriginalExtension();
            $nid_front->move(public_path('upload/nid'), $nid_front_name);
            $data->nid_front = 'upload/nid/' . $nid_front_name;
        }

        // Handle NID back upload
        if ($request->hasFile('nid_back')) {
            $nid_back = $request->file('nid_back');
            $nid_back_name = hexdec(uniqid()) . '.' . $nid_back->getClientOriginalExtension();
            $nid_back->move(public_path('upload/nid'), $nid_back_name);
            $data->nid_back = 'upload/nid/' . $nid_back_name;
        }

        // Handle CV upload
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cv_name = hexdec(uniqid()) . '.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('upload/cv'), $cv_name);
            $data->cv = 'upload/cv/' . $cv_name;
        }

        // Handle Certificate upload
        if ($request->hasFile('certificate')) {
            $certificate = $request->file('certificate');
            $certificate_name = hexdec(uniqid()) . '.' . $certificate->getClientOriginalExtension();
            $certificate->move(public_path('upload/certificate'), $certificate_name);
            $data->certificate = 'upload/certificate/' . $certificate_name;
        }

        // Store other user details
        $data->name = $request->name;
        $data->role = $request->role;
        $data->father = $request->father;
        $data->birth_date = $formattedDate;
        $data->nid = $request->nid;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->division_id = $request->division;
        $data->district_id = $request->district;
        $data->upazila_id = $request->upozila;
        $data->union_id = $request->union;
        $data->ward = $request->ward;
        $data->password = bcrypt($request->password);
        $data->raw_password = $request->password;

        $data->save();

        return redirect()->back()->with([
            'message' => 'Data Saved Successfully',
            'alert-type' => 'success'
        ]);
    }
    public function userDatastore(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'id_no' => 'required|string',
            'father' => 'nullable|string|max:255',
            'nid' => 'nullable|string|max:20',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'upazila_id' => 'nullable|exists:upazilas,id',
            'union_id' => 'nullable|exists:unions,id',
            'ward' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
            'nid_front' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
            'nid_back' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
            'certificate' => 'nullable|file',
            'password' => 'nullable|string|min:8',
        ]);


        // Combine the parts into a string
        $dob = $request->dob;
        $dateString = "{$dob['month']} {$dob['day']}, {$dob['year']}";
        // Parse the string into a Carbon instance
        $date = Carbon::parse($dateString);
        // Format the date into YYYY-MM-DD
        $formattedDate = $date->format('Y-m-d');

        try {
            DB::beginTransaction();
            $data = new User();

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/photos'), $image_name);
                $data->photo = 'upload/photos/' . $image_name;
            }

            // Handle NID front upload
            if ($request->hasFile('nid_front')) {
                $nid_front = $request->file('nid_front');
                $nid_front_name = hexdec(uniqid()) . '.' . $nid_front->getClientOriginalExtension();
                $nid_front->move(public_path('upload/nid'), $nid_front_name);
                $data->nid_front = 'upload/nid/' . $nid_front_name;
            }

            // Handle NID back upload
            if ($request->hasFile('nid_back')) {
                $nid_back = $request->file('nid_back');
                $nid_back_name = hexdec(uniqid()) . '.' . $nid_back->getClientOriginalExtension();
                $nid_back->move(public_path('upload/nid'), $nid_back_name);
                $data->nid_back = 'upload/nid/' . $nid_back_name;
            }

            // Handle CV upload
            if ($request->hasFile('cv')) {
                $cv = $request->file('cv');
                $cv_name = hexdec(uniqid()) . '.' . $cv->getClientOriginalExtension();
                $cv->move(public_path('upload/cv'), $cv_name);
                $data->cv = 'upload/cv/' . $cv_name;
            }

            // Handle Certificate upload
            if ($request->hasFile('certificate')) {
                $certificate = $request->file('certificate');
                $certificate_name = hexdec(uniqid()) . '.' . $certificate->getClientOriginalExtension();
                $certificate->move(public_path('upload/certificate'), $certificate_name);
                $data->certificate = 'upload/certificate/' . $certificate_name;
            }

            // Store other user details
            $data->name = $request->name;
            $data->role = $request->role;
            $data->parent_id = $request->parent_id ?? null;
            $data->id_no = $request->id_no;
            $data->father = $request->father ?? null;
            $data->birth_date = $formattedDate;
            $data->nid = $request->nid ?? null;
            $data->phone = $request->phone ?? null;
            $data->email = $request->email ?? null;
            $data->division_id = $request->division ?? null;
            $data->district_id = $request->district ?? null;
            $data->upazila_id = $request->upozila ?? null;
            $data->union_id = $request->union ?? null;
            $data->ward = $request->ward ?? null;
            $data->password = bcrypt($request->password);
            $data->raw_password = $request->password;

            $data->save();
            DB::commit();

            return redirect()->back()->with('success','User Created Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors',$e->getMessage());
        }

    }





    public function edit($id)
    {
        $user = User::with('division')->findOrFail($id);
        $divisions = Division::all(); // Get all divisions for dropdown

        return view('user.edit', compact('user', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate request and store the validated data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'status' => 'required|string',
            'father' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'nid' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:15',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'upazila_id' => 'nullable|exists:upazilas,id',
            'union_id' => 'nullable|exists:unions,id',
            'ward' => 'nullable|string|max:10',
            'photo' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp|max:2048',
            'nid_front' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp|max:2048',
            'nid_back' => 'nullable|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp|max:2048',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
            'certificate' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ]);

        // Update user fields
        $user->update($validatedData);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old file if exists
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            $image = $request->file('photo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/photos'), $image_name);
            $user->photo = 'upload/photos/' . $image_name;
        }

        // Handle NID front upload
        if ($request->hasFile('nid_front')) {
            if ($user->nid_front && file_exists(public_path($user->nid_front))) {
                unlink(public_path($user->nid_front));
            }

            $nid_front = $request->file('nid_front');
            $nid_front_name = hexdec(uniqid()) . '.' . $nid_front->getClientOriginalExtension();
            $nid_front->move(public_path('upload/nid'), $nid_front_name);
            $user->nid_front = 'upload/nid/' . $nid_front_name;
        }

        // Handle NID back upload
        if ($request->hasFile('nid_back')) {
            if ($user->nid_back && file_exists(public_path($user->nid_back))) {
                unlink(public_path($user->nid_back));
            }

            $nid_back = $request->file('nid_back');
            $nid_back_name = hexdec(uniqid()) . '.' . $nid_back->getClientOriginalExtension();
            $nid_back->move(public_path('upload/nid'), $nid_back_name);
            $user->nid_back = 'upload/nid/' . $nid_back_name;
        }

        // Handle CV upload
        if ($request->hasFile('cv')) {
            if ($user->cv && file_exists(public_path($user->cv))) {
                unlink(public_path($user->cv));
            }

            $cv = $request->file('cv');
            $cv_name = hexdec(uniqid()) . '.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('upload/cv'), $cv_name);
            $user->cv = 'upload/cv/' . $cv_name;
        }

        // Handle Certificate upload
        if ($request->hasFile('certificate')) {
            if ($user->certificate && file_exists(public_path($user->certificate))) {
                unlink(public_path($user->certificate));
            }

            $certificate = $request->file('certificate');
            $certificate_name = hexdec(uniqid()) . '.' . $certificate->getClientOriginalExtension();
            $certificate->move(public_path('upload/certificate'), $certificate_name);
            $user->certificate = 'upload/certificate/' . $certificate_name;
        }

        // Save updated user data
        $user->save();

        return redirect()->back()->with('message', 'User updated successfully!');
    }




    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        return redirect()->route('user.list')->with('success', 'User deleted successfully');
    }

    protected $smsService;

    public function __construct(SMSService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function status($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'approved',
            'activation_date' => now()
        ]);

        $password = $user->raw_password ?? "Your set password";
        $message = "Dear {$user->name}, your admin account has been approved!\n";
        $message .= "Email: {$user->email}\n";
        $message .= "Password: {$password}\n";


        $smsSent = $this->smsService->sendSMS($user->phone, $message);

        return redirect()->to(route('super-admin.user.manage').'?tab=pending_admins')->with('success', 'User status updated and SMS sent successfully');
        // return redirect()->back()->with('success', 'User status updated and SMS sent successfully');




        //        $smsSent = $this->smsService->sendSMS($user->phone, $message);
        //
        //        if ($smsSent) {
        //            return redirect()->route('user.list')->with('success', 'User status updated and SMS sent successfully');
        //        } else {
        //            return redirect()->route('user.list')->with('error', 'User status updated, but SMS sending failed');
        //        }
    }

    public function getUpozilaAdmins($district_id){
        $user = User::where('role', User::USER_ROLE_UPO_ADMIN)->where('status', User::STATUS_APPROVED)
        ->where('parent_id', $district_id)
        ->select(['id','name'])->get();
        return response()->json($user);
    }
    public function getUnionAdmins($upozila_id){
        $user = User::where('role', User::USER_ROLE_UNI_ADMIN)->where('status', User::STATUS_APPROVED)
        ->where('parent_id', $upozila_id)
        ->select(['id','name'])->get();
        return response()->json($user);
    }

    public function userManage(Request $request){
        setPageMeta('User Manage');

        $tab = $request->query('tab', 'ward_admins');
        $total = $request->query('total', 2);
        $search = $request->query('search');

        //approved admins
        $approved_ward_admins = User::where('role', User::USER_ROLE_WARD_ADMIN)
        ->where('status', User::STATUS_APPROVED)
        ->when(isset($search) && $tab == 'ward_admins', function ($query) use ($search) {
            return $query->where('phone', 'like', '%' . $search . '%')
            ->orWhere('id_no', 'like', '%' . $search . '%');
        })
        ->paginate($total, ['*'], 'ward_admins_page');

        $approved_district_admins = User::where('role', User::USER_ROLE_DIS_ADMIN)
        ->where('status', User::STATUS_APPROVED)
        ->when(isset($search) && $tab == 'district_admins', function ($query) use ($search) {
            return $query->where('phone', 'like', '%' . $search . '%')
            ->orWhere('id_no', 'like', '%' . $search . '%');
        })
        ->with(['division:id,name','district:id,name','upazila:id,name'])
        ->paginate($total, ['*'], 'district_admins_page');

        $approved_upozila_admins = User::where('role', User::USER_ROLE_UPO_ADMIN)
        ->where('status', User::STATUS_APPROVED)
        ->when(isset($search) && $tab == 'upozila_admins', function ($query) use ($search) {
            return $query->where('phone', 'like', '%' . $search . '%')
            ->orWhere('id_no', 'like', '%' . $search . '%');
        })
        ->with(['division:id,name','district:id,name','upazila:id,name'])
        ->paginate($total, ['*'], 'upozila_admins_page');

        $approved_union_admins = User::where('role', User::USER_ROLE_UNI_ADMIN)
        ->where('status', User::STATUS_APPROVED)
        ->when(isset($search) && $tab == 'union_admins', function ($query) use ($search) {
            return $query->where('phone', 'like', '%' . $search . '%')
            ->orWhere('id_no', 'like', '%' . $search . '%');
        })
        ->with(['division:id,name','district:id,name','upazila:id,name','union:id,name'])
        ->paginate($total, ['*'], 'union_admins_page');

        //pending users
        $pending_admins = User::query()
        ->where('status', User::STATUS_PENDING)
        ->latest()
        ->get();

        // dd($pending_admins);

        return view('SuperAdmin.user.index', compact('approved_ward_admins','tab','total','search','approved_district_admins','approved_upozila_admins','approved_union_admins','pending_admins'));
    }

    public function activeStatusUpdate(Request $request){

        $user = User::find($request->user_id);
        $user->active_status = $request->active_status;
        $user->save();
        return response()->json(['success' => true]);
    }

    public function show($id){
        setPageMeta('User Details');
        $user = User::query()
        ->with(['division:id,name','district:id,name','upazila:id,name','union:id,name','parent_admin'])
        ->findOrFail($id);

        // dd($user->parent_admin->parent_admin->parent_admin);
        return view('SuperAdmin.user.show', compact('user'));
    }
}
