<?php

namespace App\Http\Controllers\UnionAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnionAdminDashboardController extends Controller
{
    public function index()
    {
        return view('UnionAdmin.dashboard');
    }
    public function addMoney()
    {
        return view('UnionAdmin.add-money');
    }
    public function sendMoney()
    {
        return view('UnionAdmin.send-money');
    }
    public function sendMoneyReport()
    {
        return view('UnionAdmin.send-money-report');
    }
    public function cashOut()
    {
        return view('UnionAdmin.cash-out');
    }
    public function summaryReport()
    {
        return view('UnionAdmin.summary-report');
    }
    public function userManage()
    {
        return view('UnionAdmin.user-manage');
    }

    public function wardAdminReport()
    {
        return view('UnionAdmin.ward-admin-report');
    }
    public function teamList()
    {
        return view('UnionAdmin.team-list');
    }
    public function myProfile()
    {
        return view('UnionAdmin.my-profile');
    }
    public function helpLine()
    {
        return view('UnionAdmin.help-line');
    }
}
