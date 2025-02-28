<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['avatar_url','nid_front_url','nid_back_url'];

    protected $casts = [
        'date_of_birth' => 'json',
    ];

    public function getAvatarUrlAttribute()
    {
        return getStorageImage($this->avatar, true);
    }
    public function getNidFrontUrlAttribute()
    {
        return getStorageImage($this->nid_front, true);
    }
    public function getNidBackUrlAttribute()
    {
        return getStorageImage($this->nid_back, true);
    }

    public function dateOfBirth(){
        // monthNumberGenerate($this->date_of_birth['month']);
        return $this->date_of_birth['day'].'/'.monthNumberGenerate($this->date_of_birth['month']).'/'.$this->date_of_birth['year'];
    }

    public function family_members(){
        return $this->hasMany(FamilyMember::class, 'customer_id','id');
    }

    public function division(){
        return $this->belongsTo(Division::class, 'division_id','id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district_id','id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class, 'upazila_id','id');
    }
    public function union(){
        return $this->belongsTo(Union::class, 'union_id','id');
    }
    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id','id');
    }

    public function status_html() {
        return '<span class="badge ' . ($this->status == STATUS_ACTIVE ? 'bg-success' : 'bg-danger') . '">' . ucwords($this->status) . '</span>';
    }
}
