<?php

namespace App\Services;


use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransactionService extends BaseService
{


    public function __construct(Transaction $model)
    {
        parent::__construct($model);

    }
    public function createTransaction(array $data)
    {
    
        // Merge the validated data with additional fields
        $data = array_merge($data, [
            'remaining_due' => $data['type'] == Transaction::TYPE_CASH ? 0 : $data['amount'],
            'status' => $data['type'] == Transaction::TYPE_CASH ? Transaction::STATUS_COMPLETED : Transaction::STATUS_PENDING,
        ]);

        DB::beginTransaction();

        try {
              // Fetch sender's balance
            $user = User::select(['id', 'total_balance'])->find($data['sender_id']);
            if (!$user) {
                throw new \Exception('Sender not found.');
            }
            if ($user->total_balance < $data['amount']) {
                throw new \Exception('Insufficient Balance');
            }
            $user->total_balance -= $data['amount'];
            $user->save();
            $transaction = Transaction::create($data);
            $this->addUserBalance($data['receiver_id'], $data['amount']);
            $this->sendConfirmSMS($data['sender_id'], $data['receiver_id'], $data['amount']);
            DB::commit();
            return $transaction;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function addUserBalance($id, $amount){
        $user = User::select(['id','total_balance'])->find($id);
        $user->total_balance = $user->total_balance + (float)$amount;
        $user->save();
    }

    public function sendConfirmSMS($sender_id, $receiver_id, $amount){
        try {
            $sender = User::select(['id', 'name','role'])->find($sender_id);
            $receiver = User::select(['id', 'name','role','phone'])->find($receiver_id);
            $message = "Dear {$receiver->name}, your account has been credited with {$amount} by {$sender->name}. Role: " . ucwords(str_replace('_', ' ', $sender->role)) . ". \nPlease check your balance. Thank you!";
    
            $smsService = new SMSService();
            $smsService->sendSMS($receiver->phone, $message);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
