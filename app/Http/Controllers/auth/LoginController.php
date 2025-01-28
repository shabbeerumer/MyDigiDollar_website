<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    
 
    // public function authenticate(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput($request->except('password'));
    //     }

    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         $request->session()->regenerate();
            
    //         $user = Auth::user();
    //         if ($user->role === 'user') {

    //         // Bonus logic
    //         if (!$user->has_received_bonus) {
    //             $user->wallet_balance = ($user->wallet_balance ?? 0) + 5;
    //             $user->has_received_bonus = true;
    //             $user->save();
    //         }

    //         return redirect()->intended('user/webpage')
    //             ->with('success', 'Login successful!');
    //     }
    //     }

    //     return redirect()->back()
    //         ->withInput($request->except('password'))
    //         ->with('error', 'Invalid credentials');
    // }
    
    public function authenticate(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }
    
        // Check for specific email and password to convert to admin
        $email = $request->email;
        $password = $request->password;
    
        // Hardcoded credentials for admin
        $adminEmail = 'Mydigidollar1@gmail.com';
        $adminPassword = 'Pakistan@';
    
        // Attempt login with provided credentials
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            // Check if the user matches the special credentials
            if ($email === $adminEmail && $password === $adminPassword) {
                // Convert the user to an admin
                $user->role = 'admin';
                $user->save();
            }
    
            // Bonus logic for normal users
            if ($user->role === 'user' && !$user->has_received_bonus) {
                $user->wallet_balance = ($user->wallet_balance ?? 0) + 5;
                $user->has_received_bonus = true;
                $user->save();
            }
            if ($user->role === 'admin' && !$user->has_received_bonus) {
                $user->wallet_balance = ($user->wallet_balance ?? 0) + 5;
                $user->has_received_bonus = true;
                $user->save();
            }
    
            // Redirect based on the role
            if ($user->role === 'admin') {
                return redirect()->route('webpage')
                    ->with('success', 'Admin login successful!');
            } else {
                return redirect()->intended('user/webpage')
                    ->with('success', 'User login successful!');
            }
        }
    
        // Return with error if credentials are invalid
        return redirect()->back()
            ->withInput($request->except('password'))
            ->with('error', 'Invalid credentials');
    }
    
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    // public function logout(Request $request)
    // {
    //     if(Auth::user()->role === 'admin'){
    //         Auth::logout();
    //         return redirect()->route('admin.login');
    //     }
    //     if(Auth::user()->role === 'user'){
    //         Auth::logout();
    //         return redirect()->route('login');
    //     }
    //     return redirect()->route('welcome');

    // }
}
