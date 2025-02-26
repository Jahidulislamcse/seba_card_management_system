<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    protected $table = 'unions';
    protected $guarded = [];


    public function upazilas()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id');
    }

    public  function wards()
    {
        return $this->hasMany(Ward::class, 'union_id');
    }

    public  function users()
    {
        return $this->hasMany(User::class, 'union_id');
    }
}
