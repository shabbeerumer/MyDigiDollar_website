<?php

namespace App\Http\Controllers\user\withdraw;

use Illuminate\Http\Request;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use App\Models\user_packages;
use Illuminate\Support\Facades\Auth;

class WithDrawController extends Controller
{
    public function index()
    {
        return view('user.withdraw');
    }


//     public function submitWithdrawRequest(Request $request)
// {
//     $validatedData = $request->validate([
//         'payment_methods' => 'required',
//         'address' => 'required',
//         'account_number' => 'required',
//         'name' => 'required',
//         'user_name' => 'required',
//         'package_name' => 'required',
//         'withdraw_amount' => 'required|numeric|min:10'
//     ]);

//     $user = Auth::user();

//     // Check if user has sufficient balance
//     if ($user->wallet_balance < $request->withdraw_amount) {
//         return back()->with('error', 'Insufficient balance');
//     }

//     $withdrawRequest = WithdrawRequest::create([
//         'user_id' => $user->id,
//         'payment_methods' => $request->payment_methods,
//         'address' => $request->address,
//         'account_number' => $request->account_number,
//         'name' => $request->name,
//         'user_name' => $request->user_name,
//         'package_name' => $request->package_name,
//         'withdraw_amount' => $request->withdraw_amount,
//         'status' => 'pending',
//         'is_processed' => false
//     ]);

//     return back()->with('success', 'Withdraw request submitted successfully. Admin will review your request.');
// }

public function submitWithdrawRequest(Request $request)
{
    $validatedData = $request->validate([
        'payment_methods' => 'required',
        'address' => 'required',
        // 'account_number' => 'required',
        // 'name' => 'required',
        'user_name' => 'required',
        // 'package_name' => 'required',
        // 'withdraw_amount' => 'required|numeric|min:10'
        'withdraw_amount' => 'required'

    ]);

    $user = Auth::user();
    
    // Get user's package daily earning
    $userPackage = user_packages::where('user_id', $user->id)
                               ->where('status', 'active')
                               ->first();
    
    // Calculate total available balance (wallet + daily earning)
    $totalAvailableBalance = $user->wallet_balance + ($userPackage ? $userPackage->daily_earning : 0);

    // Check if user has sufficient total balance
    if ($totalAvailableBalance < $request->withdraw_amount) {
        return back()->with('error', 'Insufficient balance');
    }

    $withdrawRequest = WithdrawRequest::create([
        'user_id' => $user->id,
        'payment_methods' => $request->payment_methods,
        'address' => $request->address,
        'account_number' => $request->account_number ?? 'not adding',
        'name' => $request->name ?? 'not adding',
        'user_name' => $request->user_name,
        'package_name' => $request->package_name ?? 'not adding',
        'withdraw_amount' => $request->withdraw_amount ?? 'not adding',
        'status' => 'pending',
        'is_processed' => false
    ]);

    return back()->with('success', 'Withdraw request submitted successfully. Admin will review your request in 24 hours.');
}


}
