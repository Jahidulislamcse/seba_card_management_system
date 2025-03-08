<?php

namespace App\Http\Controllers\WardAdmin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WardAdminDashboardController extends Controller
{
    public function index()
    {
        setPageMeta('Home');
        return view('WardAdmin.dashboard');
    }

    public function offer()
    {
        $data['offers'] = Offer::where('admin_type', 'word-admin')->get();
        // dd($offers);
        return view('WardAdmin.offer', $data);
    }
}
