<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $fillable = [
        'user_id',
        'deposit_amount',
        'status',
        'processed_at'
    ]; // Make sure user_id exists

    // Relationship between UserRequest and UserPackage
    public function userPackage()
    {
        return $this->belongsTo(user_packages::class, 'user_id', 'user_id'); // Linking by user_id
    }
}
