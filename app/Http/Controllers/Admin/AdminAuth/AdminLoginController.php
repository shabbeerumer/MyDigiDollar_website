<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

//     public function authenticate(Request $request)
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
        
//         // Admin login logic
//         if ($user->role === 'admin') {
//             if (!$user->has_received_bonus) {
//                 $user->wallet_balance = ($user->wallet_balance ?? 0) + 5;
//                 $user->has_received_bonus = true;
//                 $user->save();
//             }
//             return redirect()->intended('user/webpage')
//                 ->with('success', 'Admin login successful!');
//         }
//     }

//     return redirect()->back()
//         ->withInput($request->except('password'))
//         ->with('error', 'Invalid credentials');
// }

public function authenticate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput($request->except('password'));
    }

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            // Set first admin created flag if this is the first admin login
            if (!User::where('is_first_admin_created', true)->exists()) {
                $user->is_first_admin_created = true;
                $user->save();
            }

            // Existing bonus logic
            if (!$user->has_received_bonus) {
                $user->wallet_balance = ($user->wallet_balance ?? 0) + 5;
                $user->has_received_bonus = true;
                $user->save();
            }

            return redirect()->intended('user/webpage')
                ->with('success', 'Admin login successful!');
        }
    }

    return redirect()->back()
        ->withInput($request->except('password'))
        ->with('error', 'Invalid credentials');
}



}
