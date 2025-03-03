<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\ModelBootHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DuePayment extends Model
{
    use HasFactory, ModelBootHandler;
    protected $guarded = ['id'];

    protected $appends = ['datetime_format'];


    // ----------------- Appends -------------------
    public function getDatetimeFormatAttribute(){
        return  Carbon::parse($this->datetime)->format('d M Y, h:i A');
    }
    

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
}
