<?php

namespace App\Http\Controllers\Admin\Admindashboar;

use Illuminate\Http\Request;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ReferralTransaction;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
 
    
    
    // public function updateWithdrawRequest(Request $request, $id)
    // {
    //     $withdrawRequest = WithdrawRequest::findOrFail($id);
    //     $user = User::findOrFail($withdrawRequest->user_id);
    
    //     try {
    //         if ($request->status === 'approved') {
    //             // Get user's active package
    //             $userPackage = DB::table('user_packages')
    //                 ->where('user_id', $user->id)
    //                 ->where('status', 'active')
    //                 ->first();
    
    //             if (!$userPackage) {
    //                 return redirect()->back()->with('error', 'No active package found');
    //             }
    
    //             // For first withdrawal, use daily_earning, otherwise use remaining_balance
    //             $currentBalance = $userPackage->remaining_balance > 0 ? 
    //                 $userPackage->remaining_balance : 
    //                 $userPackage->daily_earning;
    
    //             // Check if sufficient balance available
    //             if ($withdrawRequest->withdraw_amount > $currentBalance) {
    //                 return redirect()->back()->with('error', 'Insufficient balance for withdrawal');
    //             }
    
    //             // Calculate and update remaining balance
    //             $newRemainingBalance = $currentBalance - $withdrawRequest->withdraw_amount;
                
    //             DB::table('user_packages')
    //                 ->where('user_id', $user->id)
    //                 ->where('status', 'active')
    //                 ->update([
    //                     'remaining_balance' => $newRemainingBalance
    //                 ]);
    
    //             $withdrawRequest->is_processed = 1;
    //             $withdrawRequest->status = 'approved';
    //             $withdrawRequest->save();
    //         } else if ($request->status === 'rejected') {
    //             $withdrawRequest->is_processed = 1;
    //             $withdrawRequest->status = 'rejected';
    //             $withdrawRequest->save();
    //         }
    
    //         return redirect()->back()->with('success', 'Withdraw request updated');
    //     } catch (\Exception $e) {
    //         Log::error('Withdraw request update failed: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to update withdraw request');
    //     }
    // }
    public function updateWithdrawRequest(Request $request, $id)
    {
        $withdrawRequest = WithdrawRequest::findOrFail($id);
        $user = User::findOrFail($withdrawRequest->user_id);
    
        try {
            if ($request->status === 'approved') {
                // Calculate total earnings from active packages
                $totalEarnings = DB::table('user_packages')
                    ->where('user_id', $user->id)
                    ->where('status', 'active')
                    ->sum('daily_earning');
                
                $availableBalance = $totalEarnings;
    
                // Check if sufficient balance available
                if ($withdrawRequest->withdraw_amount > $availableBalance) {
                    return redirect()->back()->with('error', 'Insufficient balance for withdrawal');
                }
    
                // Update user's package daily_earning and remaining_balance
                $userPackage = DB::table('user_packages')
                    ->where('user_id', $user->id)
                    ->where('status', 'active')
                    ->first();
    
                if ($userPackage) {
                    DB::table('user_packages')
                        ->where('user_id', $user->id)
                        ->where('status', 'active')
                        ->update([
                            'remaining_balance' => $totalEarnings - $withdrawRequest->withdraw_amount
                        ]);
                }
    
                // Mark request as processed
                $withdrawRequest->is_processed = true;
                $withdrawRequest->status = 'approved';
                $withdrawRequest->save();
    
            } else if ($request->status === 'rejected') {
                $withdrawRequest->is_processed = true;
                $withdrawRequest->status = 'rejected';
                $withdrawRequest->save();
            }
    
            return redirect()->back()->with('success', 'Withdraw request updated');
        } catch (\Exception $e) {
            Log::error('Withdraw request update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update withdraw request: ' . $e->getMessage());
        }
    }
    

    
    
    
public function cardsindex(){
    return view('admin.cards');
}
public function withdrawindex()
{
    // For admin, retrieve ALL withdraw requests
    $withdrawRequests = WithdrawRequest::with('user')->get();
    
    // Or if you want to see specific details
    $withdrawRequests = WithdrawRequest::with('user')
        ->latest()
        ->get();

 

    return view('admin.withdraw', compact('withdrawRequests'));
}





}
