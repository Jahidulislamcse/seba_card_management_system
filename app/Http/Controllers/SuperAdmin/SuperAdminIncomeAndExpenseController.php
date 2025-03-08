<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Ward;

class SuperAdminIncomeAndExpenseController extends Controller
{
    public function incomeExpense()
    {
        $data = [
            'users' => User::all(),
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
        ];

        return view('SuperAdmin.income-expense.income-expense', $data);
    }
}
