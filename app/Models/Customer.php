<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['avatar_url'];


    public function getAvatarUrlAttribute()
    {
        return getStorageImage($this->avatar, true);
    }

    public function family_members(){
        return $this->hasMany(FamilyMember::class, 'customer_id','id');
    }
}
