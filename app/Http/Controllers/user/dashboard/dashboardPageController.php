<?php

namespace App\Http\Controllers\user\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReferralTransaction;
use App\Models\user_packages;
use App\Models\UserRequest;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EarningsService;

class dashboardPageController extends Controller
{


    // public function index(EarningsService $earningsService)
    // {
    //     $user = Auth::user();
        
    //     // Get all user requests
    //     $userRequests = UserRequest::where('user_id', $user->id)->get();
        
    //     // Get all active user packages
    //     $userPackages = user_packages::where('user_id', $user->id)
    //         ->where('status', 'active')
    //         ->get();
    
    //     // Calculate total daily earnings from all active packages
    //     $totalDailyEarning = $userPackages->sum('daily_earning');
    
    //     // Referral Earnings
    //     $referralEarnings = ReferralTransaction::where('referrer_id', $user->id)
    //         ->where('status', 'completed')
    //         ->sum('reward_amount');
    
    //     // Get only processed and approved withdraw requests
    //     $withdrawRequests = WithdrawRequest::where('user_id', $user->id)
    //         ->where('status', 'approved')
    //         ->where('is_processed', true)
    //         ->get();
    
    //     // Process Package Earnings
    //     $earningsProcessing = $earningsService->processPackageEarnings($user);
    
    //     return view('user.dashboard', compact(
    //         'user',
    //         'userRequests',
    //         'userPackages',
    //         'totalDailyEarning',
    //         'referralEarnings',
    //         'withdrawRequests',
    //         'earningsProcessing'
    //     ));
    // }
    

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
    
        // Referral Earnings
        $referralEarnings = ReferralTransaction::where('referrer_id', $user->id)
            ->where('status', 'completed')
            ->sum('reward_amount');
    
        // Get only processed and approved withdraw requests
        $withdrawRequests = WithdrawRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->where('is_processed', true)
            ->get();
    
        // Process Package Earnings
        $earningsProcessing = $earningsService->processPackageEarnings($user);
    
        return view('user.dashboard', compact(
            'user',
            'userRequests',
            'userPackages',
            'totalDailyEarning',
            'referralEarnings',
            'withdrawRequests',
            'earningsProcessing'
        ));
    }
    
    
    

    


    
    public function buyPackage(Request $request)
{
    $user_id = Auth::user()->id;
    
    // // Check if user already has an active package with the same name
    // $existingPackage = user_packages::where('user_id', $user_id)
    //     ->where('package_name', $request->package_name)
    //     ->where('status', 'active')
    //     ->first();

    // if ($existingPackage) {
    //     return redirect()->back()->with('error', 'You already have an active package with this name.');
    // }

    user_packages::create([
        'user_id' => $user_id,
        'package_name' => $request->package_name,
        'price' => $request->price,
        'daily_earning' => $request->earning,
        'activation_date' => null, // Will be set when approved
        'expiration_date' => null, // Will be set when approved
        'status' => 'pending',
    ]);

    return redirect()->route('depositeone');
}

}
