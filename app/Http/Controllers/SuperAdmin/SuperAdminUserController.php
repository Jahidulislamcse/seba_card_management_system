<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;

class SuperAdminUserController extends Controller
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
}
