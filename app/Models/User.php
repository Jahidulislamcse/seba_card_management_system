<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];
    protected $appends = ['photo_url'];

    // ---------------- const ----------------
    const USER_ROLE_SUPERADMIN = 'superadmin';
    const USER_ROLE_ADMIN = 'admin';
    const USER_ROLE_DIS_ADMIN = 'dis_admin';
    const USER_ROLE_UPO_ADMIN = 'upo_admin';
    const USER_ROLE_UNI_ADMIN = 'uni_admin';
    const USER_ROLE_WARD_ADMIN = 'ward_admin';

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function getPhotoUrlAttribute()
    {
        return !is_null($this->photo) ? asset($this->photo) : asset('SuperAdmin/assets/img/profile.png');
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }


    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id');
    }

    public function balance()
    {
        return $this->hasMany(Balance::class, 'admin_id')->where('status', 'approved');
    }

    public function incomeAndExpense()
    {
        return $this->hasMany(IncomeAndExpense::class, 'user_id');
    }

    public function totalBalance()
    {
        return $this->balance()->sum('amount');
    }
}
