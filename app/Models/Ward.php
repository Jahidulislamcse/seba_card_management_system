<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    protected $guarded = [];

    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id');
    }
}
