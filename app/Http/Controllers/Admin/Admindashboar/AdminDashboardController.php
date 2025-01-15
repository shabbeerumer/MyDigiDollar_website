<?php

namespace App\Http\Controllers\Admin\Admindashboar;

use Illuminate\Http\Request;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function updateWithdrawRequest(Request $request, $id)
    {
        $withdrawRequest = WithdrawRequest::findOrFail($id);
        $user = User::findOrFail($withdrawRequest->user_id);
    
        if ($request->status === 'approved' && !$withdrawRequest->is_processed) {
            // Deduct amount from user's wallet
            $user->wallet_balance -= $withdrawRequest->withdraw_amount;
            $user->save();
    
            // Mark request as processed
            $withdrawRequest->is_processed = true;
            $withdrawRequest->status = 'approved';
            $withdrawRequest->save();
        }
    
        return redirect()->back()->with('success', 'Withdraw request updated');
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
