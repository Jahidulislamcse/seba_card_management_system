<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminUserController extends Controller
{
    public function userList()
    {
        // $users = User::where('role', '!=', 'admin')->get();
        $users = User::all();
        return view('user.index', compact('users'));
    }
}
