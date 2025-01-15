<?php

namespace App\Http\Controllers\user\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReferralTransaction;
use App\Models\user_packages;
use App\Models\UserRequest;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardPageController extends Controller
{

    //         public function index()
    // {
    //     $user = Auth::user();

    //     $userRequest = UserRequest::where('user_id', $user->id)->latest()->first();

    //     $userPackage = $userRequest ? $userRequest->userPackage : null;

    //     $referralEarnings = ReferralTransaction::where('referrer_id', $user->id)
    //         ->where('status', 'completed')
    //         ->sum('reward_amount');

    //     return view('user.dashboard', compact(
    //         'user', 
    //         'userRequest', 
    //         'userPackage', 
    //         'referralEarnings'
    //     ));
    // }

    public function index()
    {
        $user = Auth::user();
        $userRequest = UserRequest::where('user_id', $user->id)->latest()->first();
        $userPackage = $userRequest ? $userRequest->userPackage : null;

        // Referral Earnings
        $referralEarnings = ReferralTransaction::where('referrer_id', $user->id)
            ->where('status', 'completed')
            ->sum('reward_amount');

        // Get only processed and approved withdraw requests
        $withdrawRequests = WithdrawRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->where('is_processed', true)
            ->get();

        // Calculate total withdrawn amount
        $totalWithdrawn = $withdrawRequests->sum('withdraw_amount');

        return view('user.dashboard', compact(
            'user',
            'userRequest',
            'userPackage',
            'referralEarnings',
            'withdrawRequests',
            'totalWithdrawn'
        ));
    }



    public function buyPackage(Request $request)
    {
        $user_id = Auth::user()->id;
        user_packages::create([
            'user_id' => $user_id,
            'package_name' => $request->package_name,
            'price' => $request->price,
            'daily_earning' => $request->earning,
            'activation_date' => now(),
            'expiration_date' => now()->addYear(),
            'status' => 'pending',
        ]);

        return redirect()->route('depositeone');
    }
}
