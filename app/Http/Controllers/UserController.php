<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

use App\Services\SMSService;

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


    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'father' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
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

        // Store the user data
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
        $data->birth_date = $request->birth_date;
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
        $user->update(['status' => 'approved']);

        $password = $user->raw_password ?? "Your set password";
        $message = "Dear {$user->name}, your admin account has been approved!\n";
        $message .= "Email: {$user->email}\n";
        $message .= "Password: {$password}\n";


        $smsSent = $this->smsService->sendSMS($user->phone, $message);

        return redirect()->route('user.list')->with('success', 'User status updated and SMS sent successfully');




//        $smsSent = $this->smsService->sendSMS($user->phone, $message);
//
//        if ($smsSent) {
//            return redirect()->route('user.list')->with('success', 'User status updated and SMS sent successfully');
//        } else {
//            return redirect()->route('user.list')->with('error', 'User status updated, but SMS sending failed');
//        }
    }
}
