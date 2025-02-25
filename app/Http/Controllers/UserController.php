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
            'division' => 'nullable|exists:divisions,id',
            'district' => 'nullable|exists:districts,id',
            'upozila' => 'nullable|exists:upazilas,id',
            'union' => 'nullable|exists:unions,id',
            'ward' => 'nullable|string|max:255',
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
        $data->division = $request->division;
        $data->district = $request->district;
        $data->upozila = $request->upozila;
        $data->union = $request->union;
        $data->ward = $request->ward;
        $data->password = bcrypt($request->password);

        $data->save();

        return redirect()->back()->with([
            'message' => 'Data Saved Successfully',
            'alert-type' => 'success'
        ]);
    }

}
