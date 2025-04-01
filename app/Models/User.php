<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'wallet_balance',
        'referral_code',
        'has_received_bonus'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'wallet_balance' => 'float',
    ];

    /**
     * Get the user's package.
     */
    public function userPackage()
    {
        return $this->hasOne(user_packages::class, 'user_id');
    }

    /**
     * Get all packages for the user.
     */
    public function packages()
    {
        return $this->hasMany(user_packages::class, 'user_id');
    }

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->referral_code)) {
                $user->referral_code = Str::random(10);
            }
            if (!isset($user->wallet_balance)) {
                $user->wallet_balance = 0;
            }
        });
    }
}
