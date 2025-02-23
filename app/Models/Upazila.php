<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $table = 'upazilas';
    protected $guarded = [];



    public  function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public  function union()
    {
        return $this->hasMany(Union::class, 'upazila_id');
    }
}
