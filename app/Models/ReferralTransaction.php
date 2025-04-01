<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralTransaction extends Model
{
    protected $fillable = [
        'referrer_id',       // User who referred
        'referred_user_id',  // User who was referred
        'reward_amount',     // Amount of referral reward
        'status'             // Transaction status
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referredUser()
    {
        return $this->belongsTo(User::class, 'referred_user_id');
    }
}
