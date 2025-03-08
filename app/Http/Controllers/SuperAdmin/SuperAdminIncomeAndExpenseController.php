<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\IncomeAndExpense;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Ward;

class SuperAdminIncomeAndExpenseController extends Controller
{
    public function incomeExpense()
    {
        $incomes = IncomeAndExpense::where('type', 'income')->get();
        $expenses = IncomeAndExpense::where('type', 'expense')->get();

        return view('SuperAdmin.income-expense.income-expense', compact('incomes', 'expenses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'invoice_id' => 'required|string',
            'date' => 'required|date',
            'purpose' => 'required|string',
            'type' => 'required|in:income,expense',
        ]);

        IncomeAndExpense::create([
            'user_id' => auth()->id(),
            'amount' => $validatedData['amount'],
            'invoice_id' => $validatedData['invoice_id'],
            'date' => $validatedData['date'],
            'type' => $validatedData['type'],
            'purpose' => $validatedData['purpose'],
        ]);

        return back()->with('success', 'Entry added successfully!');
    }
}
