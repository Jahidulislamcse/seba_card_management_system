<?php

namespace App\Http\Controllers\UnionAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnionAdminDashboardController extends Controller
{
    public function index()
    {
        // dd('Union Admin Dashboard');
        return view('UnionAdmin.dashboard');
    }
}
