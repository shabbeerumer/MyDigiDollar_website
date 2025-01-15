<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    // public function processregister(Request $request){
    //     {
    //         $validate = Validator::make($request->all(), [
    //             'email' => 'required|email|unique:users',
    //             'password' => 'required|min:5|confirmed'
    //         ]);
    
    //         if ($validate->passes()) {

                // $user = new User();
                // $user->username = $request->user_name;
                // $user->name = $request->first_name;
                // $user->email = $request->email;
                // $user->password = Hash::make($request->password);
                // $user->referral_username = $request->last_name;
                // $user->role = 'user';
                // $user->referral_code = Str::random(10);
                // $user->referred_by = $request->referral_code; 
                // $user->save();
                // return redirect()->route('login')->with('success', 'Registration successful!');
               
    //         } else {
    //             return redirect()->back()->withInput()->withErrors($validate);
    //         }
    //     }
    // }
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
        $user->role = 'user';
        $user->referral_code = Str::random(10);
    
        // Handle referral logic
        if ($referrer) {
            $user->referred_by = $referrer->referral_code;
            $user->referrer_id = $referrer->id;
        }
    
        // Save user
        $user->save();
    
        // Redirect with success message
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    

}
