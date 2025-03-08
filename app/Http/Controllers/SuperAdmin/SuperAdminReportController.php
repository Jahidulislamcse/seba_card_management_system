<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Customer;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;

class SuperAdminReportController extends Controller
{
    public function reportGlance()
    {
        $data = [
            'users' => User::all(),
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
        ];

        return view('SuperAdmin.report.at-a-glance', $data);
    }

    public function reportUser()
    {
        $data = [
            'users' => User::all(),
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
            'cards' => Card::all(),
            'customers' => Customer::all(),
        ];

        return view('SuperAdmin.report.user', $data);
    }

    public function searchAdmin(Request $request)
    {
        $query = $request->input('query');

        $user = User::where('id_no', $query)
            ->orWhere('phone', $query)
            ->first();

        if (!$user) {
            return back()->with('error', 'No user found with this ID or Phone Number.');
        }

        $customers = Customer::where('user_id', $user->id)->get();
        $cardsAdded = $customers->count();
        $activeCards = $customers->where('status', 'active')->count();

        $cards = Card::where('assign_id', $user->id)->get();
        $cardsAssigned = $cards->count();
        $cardStock = $cardsAssigned- $cardsAdded;
        return view('SuperAdmin.report.user', compact('user', 'customers', 'activeCards', 'cardsAdded', 'cardStock'));
    }
}
