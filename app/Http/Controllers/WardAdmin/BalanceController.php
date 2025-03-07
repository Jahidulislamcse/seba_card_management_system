<?php

namespace App\Http\Controllers\WardAdmin;

use App\Models\Balance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
{
    public function create()
    {
        return view('WardAdmin.balance.create');
    }

    public function store(Request $request)
    {
        // ✅ Validate form data
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'transaction_id' => 'required|string|unique:balances,transaction_id|max:50',
            'payment_method' => 'required|in:bkash,rocket,nagad',
        ]);

        // ✅ Store data into Balance model
        Balance::create([
            'admin_id' => auth()->id(),
            'amount' => $request->amount,
            'transaction_id' => $request->transaction_id,
            'payment_method' => $request->payment_method,
        ]);

        // ✅ Redirect with success message
        return redirect()->back()->with('success', 'Balance added successfully!');
    }
}
