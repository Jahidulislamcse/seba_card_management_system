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
    protected $appends = ['photo_url','nid_front_url','nid_back_url','cv_url','certificate_url'];

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
    public function getNidFrontUrlAttribute()
    {
        return !is_null($this->nid_front) ? asset($this->nid_front) : asset('images/default/not_available.jpg');
    }
    public function getNidBackUrlAttribute()
    {
        return !is_null($this->nid_back) ? asset($this->nid_back) : asset('images/default/not_available.jpg');
    }
    public function getCvUrlAttribute()
    {
        return !is_null($this->cv) ? asset($this->cv) : asset('images/default/not_available.jpg');
    }
    public function getCertificateUrlAttribute()
    {
        return !is_null($this->certificate) ? asset($this->certificate) : asset('images/default/not_available.jpg');
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

    public function getRoleName(): string
    {
        return match ($this->role) {
            self::USER_ROLE_ADMIN => 'এডমিন/সাব এডমিন',
            self::USER_ROLE_DIS_ADMIN => 'জেলা এডমিন',
            self::USER_ROLE_UPO_ADMIN => 'উপজেলা এডমিন',
            self::USER_ROLE_UNI_ADMIN => 'ইউনিয়ন এডমিন',
            self::USER_ROLE_WARD_ADMIN => 'ওর্য়াড এডমিন',
            default => '',
        };
    }

     // Upozila Admin has many Union Admins
     public function upozila_admins()
     {
         return $this->hasMany(User::class, 'parent_id')->where('role', self::USER_ROLE_UPO_ADMIN);
     }
     public function union_admins()
     {
         return $this->hasMany(User::class, 'parent_id')->where('role', self::USER_ROLE_UNI_ADMIN);
     }
     public function ward_admins()
     {
         return $this->hasMany(User::class, 'parent_id')->where('role', self::USER_ROLE_WARD_ADMIN);
     }

     // Get parent admin (for union admins -> upozila admin, for ward admins -> union admin)
    public function parent_admin()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(User::class, 'parent_id')->with('children');
    }

    public function getDistrictAdminName(): string
    {
        if ($this->role === self::USER_ROLE_WARD_ADMIN) {
            $user = $this->parent_admin?->parent_admin?->parent_admin ?? null;
            return !is_null($user)? $user->name .' (Id No: '. $user->id_no .')' : '';
        }
        if ($this->role === self::USER_ROLE_UNI_ADMIN) {
            $user = $this->parent_admin?->parent_admin ?? null;
            return !is_null($user)? $user->name .' (Id No: '. $user->id_no .')' : '';

        }
        if ($this->role === self::USER_ROLE_UPO_ADMIN) {
            $user = $this->parent_admin ?? null;
            return !is_null($user)? $user->name .' (Id No: '. $user->id_no .')' : '';
        }
        return '';
    }

    public function getUpazilaAdminName(): string
    {
        if ($this->role === self::USER_ROLE_WARD_ADMIN) {
            $user = $this->parent_admin?->parent_admin ?? null;
            return !is_null($user)? $user->name .' (Id No: '. $user->id_no .')' : '';
        }
        if ($this->role === self::USER_ROLE_UNI_ADMIN) {
            $user = $this->parent_admin ?? null;
            return !is_null($user)? $user->name .' (Id No: '. $user->id_no .')' : '';
        }
        return '';
    }

    public function getUnionAdminName(): string
    {
        if ($this->role === self::USER_ROLE_WARD_ADMIN) {
            $user = $this->parent_admin ?? null;
            return !is_null($user)? $user->name .' (Id No: '. $user->id_no .')' : '';
        }
        return '';
    }
}
