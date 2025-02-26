<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';

    protected $guarded = [];

    public  function districts()
    {
        return $this->hasMany(District::class);
    }

    public  function users()
    {
        return $this->hasMany(User::class, 'division_id');
    }
}
