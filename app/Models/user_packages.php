<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_packages extends Model
{
    protected $fillable = [
        'user_id',  // Add user_id here
        'package_name',
        'price',
        'daily_earning',
        'activation_date',
        'expiration_date',
        'last_earning_update',
        'status',
    ];

    public function userRequests()
    {
        return $this->hasMany(UserRequest::class);
    }
}
