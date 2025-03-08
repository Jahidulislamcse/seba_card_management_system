<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeAndExpense extends Model
{
    protected $fillable = ['user_id', 'amount', 'invoice_id', 'date', 'purpose', 'type'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
