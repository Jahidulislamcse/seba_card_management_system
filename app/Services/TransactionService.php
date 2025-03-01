<?php

namespace App\Services;


use Carbon\Carbon;
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
            if ((float)$user->total_balance < (float)$data['amount']) {
                throw new \Exception('Insufficient Balance');
            }
            $user->total_balance -= (float)$data['amount'];
            $user->save();
            $transaction = Transaction::create($data);
            $this->addUserBalance($data['receiver_id'], $data['amount']);
            $this->sendConfirmSMS($data['receiver_id'], $data['amount']);
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

    public function sendConfirmSMS( $receiver_id, $amount){
        try {
            
            $receiver = User::select(['id', 'name','role','phone'])->find($receiver_id);
            
            $createdAt = Carbon::parse($receiver->created_at);
            // Format the date and time
            $formattedDate = $createdAt->format('d-m-Y \a\t H:i');
            $message = "Dear,".strtoupper($receiver->name)." \n";
            $message .= "Your Wallet {$receiver->phone} is Credited with BDT. {$amount} on {$formattedDate}\n";
            $message .= "Current Balance is BDT. {$receiver->total_balance}\n\n";
            $message .= "Qtech Bangladesh";
    
            $smsService = new SMSService();
            $smsService->sendSMS($receiver->phone, $message);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
