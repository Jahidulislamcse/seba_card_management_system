<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    protected $fillable = [
        'creator_id',
        'card_number',
        'price',
        'start_date',
        'end_date',
        'status',
        'assign_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    public function wardAdmin()
    {
        return $this->belongsTo(User::class, 'assign_id');
    }
    public  function customer()
    {
        return $this->hasOne(Customer::class, 'card_id');
    }
}
