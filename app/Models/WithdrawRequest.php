<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    protected $fillable = [
        'user_id',
        'payment_methods',
        'address',
        'account_number',
        'name',
        'user_name',
        'package_name',
        'withdraw_amount',
        'status',
        'is_processed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
