<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class user_packages extends Model
// {
//     protected $fillable = [
//         'user_id',  
//         'package_name',
//         'price',
//         'daily_earning',
//         'activation_date',
//         'expiration_date',
//         'last_earning_update',
//         'status',
//     ];

//     public function userRequests()
//     {
//         return $this->hasMany(UserRequest::class);
//     }
// }
class user_packages extends Model
{
    protected $table = 'user_packages';

    protected $fillable = [
        'user_id', 
        'package_name', 
        'price', 
        'daily_earning', 
        'activation_date', 
        'expiration_date', 
        'last_earning_update',
        'remaining_balance', 
        'status'
    ];

    protected $dates = [
        'activation_date', 
        'expiration_date', 
        'last_earning_update'
    ];

    // Mutator for status
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
