<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use App\Http\Requests\SuperAdmin\TransactionRequest;

class TransactionController extends Controller
{
    public $transactionService;
    public function __construct(TransactionService $transactionService){
        $this->transactionService = $transactionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        setPageMeta('Send Money');
        return view('SuperAdmin.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->validated();

        try {
            $this->transactionService->createTransaction($data);
            return redirect()->back()->with('success', 'Send Money Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function searchNumber(Request $request){
        $search = $request->search;
        $user = User::where('phone', 'like', '%' . $search . '%')
        ->whereNotIn('role', [User::USER_ROLE_SUPERADMIN, User::USER_ROLE_ADMIN])
        ->where('status', User::STATUS_APPROVED)
        ->first();
        return response()->json($user);
    }

}
