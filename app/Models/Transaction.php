<?php

namespace App\Models;

use App\Traits\ModelBootHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, ModelBootHandler;
    protected $guarded = ['id'];

    // ---------------- const ----------------
    public const TYPE_CASH = 'cash';
    public const TYPE_DUE = 'due';
    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_PARTIAL = 'partial';

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function due_payments(){
        return $this->hasMany(DuePayment::class);
    }
    public function due_payment(){
        return $this->hasOne(DuePayment::class);
    }
}
