<?php

namespace App\Http\Controllers\Admin\AdminAuth;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function register()
    {
        return view('admin.register');
    }

    public function processregister(Request $request)
    {
        // Validate input
        $request->validate([
            'user_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'last_name' => 'required|string|max:255',
        ]);
    
        // Prepare user data
        $referrerId = $request->input('referrer_id');
        $referrer = $referrerId ? User::find($referrerId) : null;
    
        $user = new User();
        $user->username = $request->user_name;
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->referral_username = $request->last_name;
        $user->role = 'admin';
        $user->referral_code = Str::random(10);
    
        // Handle referral logic
        if ($referrer) {
            $user->referred_by = $referrer->referral_code;
            $user->referrer_id = $referrer->id;
        }
    
        // Save user
        $user->save();
    
        // Redirect with success message
        return redirect()->route('admin.login')->with('success', 'Admin Registration successful!');
    }
}
