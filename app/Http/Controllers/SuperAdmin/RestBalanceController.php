<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\RestBalanceRequest;
use App\Services\TransactionService;
use App\Http\Requests\SuperAdmin\TransactionRequest;

class RestBalanceController extends Controller
{
    public $transactionService;
    public function __construct(TransactionService $transactionService){
        $this->transactionService = $transactionService;
    }
    public function restBalances(Request $request){
        // Set page meta
        setPageMeta('Balance account');
        // Set default values for 'total' and 'search'
        $total = $request->query('total', 10);
        $search = $request->query('search');
        // dd($search);

        $restBalances = Transaction::query()
        
        ->where('type', Transaction::TYPE_DUE)
        ->with(['receiver'])
        ->whereHas('receiver', function ($query) use ($search) {
            $query->where('phone','like','%' . $search . '%')
            ->orWhere('nid', 'like', '%' . $search . '%');
        })
        ->paginate($total);

        // Append query parameters to pagination links
        $restBalances->appends([
            'total' => $total,
            'search' => $search,
        ]);
    
        return view('SuperAdmin.transaction.rest-balances', compact('restBalances', 'total', 'search'));
    }

    public function restBalanceDetails($id){
        return view('SuperAdmin.transaction.rest-balance-collect');
    }
    public function restBalanceCollect($id){
        $restBalance = Transaction::find($id);
        return view('SuperAdmin.transaction.rest-balance-collect', compact('restBalance'));
    }

    public function restBalanceStore(RestBalanceRequest $request, $id){
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $restBalance = Transaction::find($data['transaction_id']);
            $remaining_due = (float) $restBalance->remaining_due ;
            $restBalance->remaining_due -= (float)$data['amount'];
            $restBalance->status = $remaining_due == (float)$data['amount'] ? Transaction::STATUS_COMPLETED : Transaction::STATUS_PARTIAL;
            $restBalance->save(); 
    
            
            $restBalance->due_payment()->create([
                'amount' => $data['amount'],
                'datetime' => $data['datetime'] ,
                'notes' => $data['notes'] ?? '',
            ]);
            DB::commit();
            return redirect()->route('super-admin.rest-balance.index')->with('success', 'Created Successfully');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    
    }
}
