<?php

namespace App\Http\Controllers\user\withdraw;

use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Models\user_packages;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ReferralTransaction;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\EarningsService;

class WithDrawController extends Controller
{


  
public function index(EarningsService $earningsService)
{
    $user = Auth::user();
    
    // Get all user requests with their status
    $userRequests = UserRequest::where('user_id', $user->id)
        ->where('status', 'approved')
        ->get();
    
    // Get only active packages that match approved requests
    $userPackages = collect();
    
    foreach ($userRequests as $request) {
        $package = user_packages::where('user_id', $user->id)
            ->where('status', 'active')
            ->where('package_name', $request->package)
            ->where(function($query) use ($request) {
                $query->where('created_at', '<=', $request->created_at)
                    ->orWhereNull('created_at');
            })
            ->orderBy('created_at', 'desc')
            ->first();
            
        if ($package) {
            $userPackages->push($package);
        }
    }

    // Calculate total daily earnings
    $totalDailyEarning = $userPackages->sum('daily_earning');

    // Get referral earnings
    $referralEarnings = ReferralTransaction::where('referrer_id', $user->id)
        ->where('status', 'completed')
        ->sum('reward_amount');

    // Get only processed and approved withdraw requests
    $withdrawAmount = WithdrawRequest::where('user_id', $user->id)
        ->where('status', 'approved')
        ->where('is_processed', true)
        ->sum('withdraw_amount');

    // Calculate available balance exactly as dashboard does
    $availableBalance = $totalDailyEarning + 
                       ($referralEarnings ?? 0) + 
                       ($user->has_received_bonus ? 5 : 0) - 
                       $withdrawAmount;

    // Get all withdraw requests for display
    $allWithdrawRequests = WithdrawRequest::where('user_id', $user->id)->get();
    
    return view('user.withdraw', [
        'availableBalance' => $availableBalance,
        'withdrawRequests' => $allWithdrawRequests
    ]);
}


    
    

    
    
    
    



// public function submitWithdrawRequest(Request $request)
// {
//     $validatedData = $request->validate([
//         'payment_methods' => 'required',
//         'address' => 'required',
//         // 'account_number' => 'required',
//         // 'name' => 'required',
//         'user_name' => 'required',
//         // 'package_name' => 'required',
//         // 'withdraw_amount' => 'required|numeric|min:10'
//         'withdraw_amount' => 'required'

//     ]);

//     $user = Auth::user();
    
//     // Get user's package daily earning
//     $userPackage = user_packages::where('user_id', $user->id)
//                                ->where('status', 'active')
//                                ->first();
    
//     // Calculate total available balance (wallet + daily earning)
//     $totalAvailableBalance = $user->wallet_balance + ($userPackage ? $userPackage->daily_earning : 0);

//     // Check if user has sufficient total balance
//     if ($totalAvailableBalance < $request->withdraw_amount) {
//         return back()->with('error', 'Insufficient balance');
//     }

//     $withdrawRequest = WithdrawRequest::create([
//         'user_id' => $user->id,
//         'payment_methods' => $request->payment_methods,
//         'address' => $request->address,
//         'account_number' => $request->account_number ?? 'not adding',
//         'name' => $request->name ?? 'not adding',
//         'user_name' => $request->user_name,
        // 'package_name' => $request->package_name ?? 'not adding',
        // 'withdraw_amount' => $request->withdraw_amount ?? 'not adding',
//         'status' => 'pending',
//         'is_processed' => false
//     ]);

//     return back()->with('success', 'Withdraw request submitted successfully. Admin will review your request in 24 hours.');
// }



public function submitWithdrawRequest(Request $request)
{
    // Enhanced validation rules
    $validatedData = $request->validate([
        'payment_methods' => 'required|in:TRC20,ERC20,BEP20',
        'user_name' => 'required|string',
        'withdraw_amount' => 'required|numeric|min:50|max:10000',
        'address' => 'required|string|min:5'
    ]);

    $user = Auth::user();
    
    // Calculate total earnings from all active packages
    $totalEarnings = DB::table('user_packages')
        ->where('user_id', $user->id)
        ->where('status', 'active')
        ->sum('daily_earning');
    
    $availableBalance = $user->wallet_balance + $totalEarnings;

    // Validate withdrawal amount against available balance
    if ($request->withdraw_amount > $availableBalance) {
        return back()
            ->withInput()
            ->with('error', "Insufficient balance. Available balance: $" . number_format($availableBalance, 2));
    }

    try {
        // Create withdrawal request
        WithdrawRequest::create([
            'user_id' => $user->id,
            'payment_methods' => $request->payment_methods,
            'address' => $request->address,
            'account_number' => $request->account_number ?? 'not adding',
            'name' => $request->name ?? 'not adding',
            'user_name' => $request->user_name,
            'package_name' => $request->package_name ?? 'not adding',
            'withdraw_amount' => $request->withdraw_amount,
            'status' => 'pending',
            'is_processed' => false
        ]);

        return back()->with('success', 'Withdrawal request submitted successfully. Admin will review your request in 24 hours.');
    } catch (\Exception $e) {
        Log::error('Withdrawal request failed: ' . $e->getMessage());
        return back()
            ->withInput()
            ->with('error', 'An error occurred while processing your request. Please try again.');
    }
}

}
