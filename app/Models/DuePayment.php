<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelBootHandler;

class DuePayment extends Model
{
    use HasFactory, ModelBootHandler;
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
}
