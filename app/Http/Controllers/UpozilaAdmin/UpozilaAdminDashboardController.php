<?php

namespace App\Http\Controllers\UpozilaAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpozilaAdminDashboardController extends Controller
{
    public function index()
    {
        return view('UpozilaAdmin.dashboard');
    }
}
