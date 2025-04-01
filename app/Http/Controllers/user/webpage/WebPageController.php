<?php

namespace App\Http\Controllers\user\webpage;

use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Models\user_packages;
use Illuminate\Support\Facades\DB;
use App\Models\ReferralTransaction;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Jobs\PackagePriceIncreaseJob;
use App\Notifications\PackageActivationNotification;


class WebPageController extends Controller
{
    public function index(){
        return view('user.webpage');
    }

//     public function showRequests()
// {
//     $requests = UserRequest::where('status', 'pending')->get();
//     return view('admin.admin_requests', compact('requests'));
// }
public function showRequests(Request $request)
{
    $query = UserRequest::query();
    
    // If status filter is applied
    if ($request->has('status') && $request->status !== 'all') {
        $query->where('status', $request->status);
    }
    
    $requests = $query->orderBy('created_at', 'desc')->get();
    return view('admin.admin_requests', compact('requests'));
}


// public function updateRequest(Request $request, $id)
// {
//     $userRequest = UserRequest::findOrFail($id);

//     $userRequest->status = $request->status; 
//     $userRequest->save();

//     if ($request->status === 'approved') {
//         $referredUser = User::find($userRequest->user_id); // The user who bought the package (Ali)

//         if ($referredUser && $referredUser->referrer_id) {
//             $referrer = User::find($referredUser->referrer_id); // The referrer (Umer)

//             if ($referrer) {
//                 // Create referral transaction
//                 ReferralTransaction::create([
//                     'referrer_id' => $referrer->id,
//                     'referred_user_id' => $referredUser->id, // Use $referredUser instead of undefined $newUser
//                     'reward_amount' => 10,
//                     'status' => 'completed'
//                 ]);

//                 // Retrieve the current wallet balance or set to 0 if not set
//                 $currentBalance = $referrer->wallet_balance ?? 0;

//                 // Add $10 to the current balance
//                 $referrer->wallet_balance = $currentBalance + 10;

//                 // Save the updated wallet balance
//                 $referrer->save();
//             }
//         }
//     }

//     return redirect()->back()->with('success', 'Request status updated successfully!');
// }


// public function updateRequest(Request $request, $id)
// {
//     // Validate incoming request
//     $request->validate([
//         'status' => 'required|in:pending,approved,rejected'
//     ]);

//     // Find the specific user request
//     $userRequest = UserRequest::findOrFail($id);

//     // Update request status
//     $userRequest->status = $request->status;
//     $userRequest->save();

//     // Conditional logic based on status
//     switch ($request->status) {
//         case 'approved':
//             return $this->handleApprovedRequest($userRequest);
//         case 'rejected':
//             return $this->handleRejectedRequest($userRequest);
//         default:
//             return redirect()->back()->with('success', 'Request status updated');
//     }
// }

// // Specific handler for approved requests
// protected function handleApprovedRequest($userRequest)
// {
//     // Activate User Package
//     $package = user_packages::where('user_id', $userRequest->user_id)->first();
    
//     if ($package) {
//         $package->update([
//             'status' => 'active',
//             'activation_date' => now(),
//             'expiration_date' => now()->addYear()
//         ]);
//     }

//     // Process Referral (Optional)
//     $this->processReferralReward($userRequest);

//     return redirect()->back()->with('success', 'Request approved successfully');
// }

// // Specific handler for rejected requests
// protected function handleRejectedRequest($userRequest)
// {
//     // Optional: Add specific rejection logic
//     return redirect()->back()->with('warning', 'Request rejected');
// }

// // Referral reward processing
// protected function processReferralReward($userRequest)
// {
//     $referredUser = User::find($userRequest->user_id);

//     if ($referredUser && $referredUser->referrer_id) {
//         $referrer = User::find($referredUser->referrer_id);

//         if ($referrer) {
//             ReferralTransaction::create([
//                 'referrer_id' => $referrer->id,
//                 'referred_user_id' => $referredUser->id,
//                 'reward_amount' => 10,
//                 'status' => 'completed'
//             ]);

//             $referrer->increment('wallet_balance', 10);
//         }
//     }
// }


// public function updateRequest(Request $request, $id)
//     {
//         // Validate incoming request
//         $request->validate([
//             'status' => 'required|in:pending,approved,rejected'
//         ]);

//         // Find the specific user request
//         $userRequest = UserRequest::findOrFail($id);

//         // Update request status
//         $userRequest->status = $request->status;
//         $userRequest->save();

//         // Conditional logic based on status
//         switch ($request->status) {
//             case 'approved':
//                 return $this->handleApprovedRequest($userRequest);
//             case 'rejected':
//                 return $this->handleRejectedRequest($userRequest);
//             default:
//                 return redirect()->back()->with('success', 'Request status updated');
//         }
//     }


    // // Specific handler for approved requests
    // protected function handleApprovedRequest($userRequest)
    // {
    //     // Activate User Package
    //     $package = user_packages::where('user_id', $userRequest->user_id)->first();
        
    //     if ($package) {
    //         $package->update([
    //             'status' => 'active',
    //             'activation_date' => now(),
    //             'expiration_date' => now()->addYear(),
    //             'initial_price' => $package->price // Store initial price
    //         ]);

    //         // Schedule price increase job
    //         PackagePriceIncreaseJob::dispatch($package->id)
    //             ->delay(now()->addDay()); // For testing, increase after 1 minute
    //     }

    //     // Process Referral (Optional)
    //     $this->processReferralReward($userRequest);

    //     return redirect()->back()->with('success', 'Request approved successfully');
    // }

    // // Specific handler for rejected requests
    // protected function handleRejectedRequest($userRequest)
    // {
    //     // Optional: Add specific rejection logic
    //     return redirect()->back()->with('warning', 'Request rejected');
    // }

    // // Referral reward processing
    // protected function processReferralReward($userRequest)
    // {
    //     $referredUser = User::find($userRequest->user_id);

    //     if ($referredUser && $referredUser->referrer_id) {
    //         $referrer = User::find($referredUser->referrer_id);

    //         if ($referrer) {
    //             ReferralTransaction::create([
    //                 'referrer_id' => $referrer->id,
    //                 'referred_user_id' => $referredUser->id,
    //                 'reward_amount' => 10,
    //                 'status' => 'completed'
    //             ]);

    //             $referrer->increment('wallet_balance', 10);
    //         }
    //     }
    // }

   


    // protected function handleApprovedRequest($userRequest)
    // {
    //     $package = user_packages::where('user_id', $userRequest->user_id)->first();
        
    //     if ($package) {
    //         $package->update([
    //             'status' => 'active',
    //             'activation_date' => now(),
    //             'expiration_date' => now()->addYear(),
    //             'initial_price' => $package->price
    //         ]);
    
    //         PackagePriceIncreaseJob::dispatch($package->id)
    //             ->delay(now()->addDay());

                
    //     }
    
    //     $userRequest->update([
    //         'status' => 'approved',
    //         'processed_at' => now()
    //     ]);
    
    //     $this->processReferralReward($userRequest);
    
    //     return redirect()->back()->with('success', 'Request approved successfully');
    // }
    
   // protected function processReferralReward($userRequest)
    // {
    //     $referredUser = User::find($userRequest->user_id);
    
    //     if ($referredUser && $referredUser->referrer_id) {
    //         $referrer = User::find($referredUser->referrer_id)->first();
    
    //         if ($referrer) {
    //             ReferralTransaction::create([
    //                 'referrer_id' => $referrer->id,
    //                 'referred_user_id' => $referredUser->id,
    //                 'reward_amount' => 10,
    //                 'status' => 'completed'
    //             ]);
    
    //             $referrer->increment('wallet_balance', 10);
    //         }
    //     }
    // }


    public function updateRequest(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);
    
        // Find the specific user request
        $userRequest = UserRequest::findOrFail($id);
    
        // Store the original status
        $originalStatus = $userRequest->status;
    
        // Update request status
        $userRequest->status = $request->status;
        $userRequest->save();
    
        // Only process if status is changing from pending
        if ($originalStatus === 'pending') {
            switch ($request->status) {
                case 'approved':
                    return $this->handleApprovedRequest($userRequest);
                case 'rejected':
                    return $this->handleRejectedRequest($userRequest);
            }
        }
    
        return redirect()->back()->with('success', 'Request status updated');
    }

    
    protected function handleApprovedRequest($userRequest)
    {
        try {
            DB::beginTransaction();
    
            // Package Prices Mapping
            $packagePrices = [
                'Bronze Starter' => 100,
                'Silver Saver' => 200,
                'Golden Opportunity' => 300,
                'Plantinum Plus' => 400,
                'Diamond Elite' => 500,
                'Emerald Advantage' => 1000,
                'Ruby Reward' => 1500,
                'Sapphire Pro' => 3000,
                'Titanium Master' => 5000,
                'Infinity Legend' => 10000
            ];
    
            // Package Earnings Mapping
            $packageEarnings = [
                'Bronze Starter' => 1.50,
                'Silver Saver' => 3.00,
                'Golden Opportunity' => 4.50,
                'Plantinum Plus' => 6.00,
                'Diamond Elite' => 10.00,
                'Emerald Advantage' => 25.00,
                'Ruby Reward' => 40.00,
                'Sapphire Pro' => 100.00,
                'Titanium Master' => 150.00,
                'Infinity Legend' => 350.00
            ];

            // Calculate current total earnings
            $currentEarnings = user_packages::where('user_id', $userRequest->user_id)
                ->where('status', 'active')
                ->sum('daily_earning');

            // Get the price of the new package
            $newPackagePrice = $packagePrices[$userRequest->package] ?? 0;

            // Find current pending package
            $package = user_packages::where('user_id', $userRequest->user_id)
                ->where('status', 'pending')
                ->first();

            if (!$package) {
                $package = user_packages::create([
                    'user_id' => $userRequest->user_id,
                    'package_name' => $userRequest->package,
                    'status' => 'pending'
                ]);
            }

            // If current earnings are higher than new package price, subtract the price
            if ($currentEarnings > $newPackagePrice) {
                // Update all active packages to reduce their earnings proportionally
                $activePackages = user_packages::where('user_id', $userRequest->user_id)
                    ->where('status', 'active')
                    ->get();

                foreach ($activePackages as $activePackage) {
                    $reductionRatio = ($currentEarnings - $newPackagePrice) / $currentEarnings;
                    $activePackage->daily_earning = $activePackage->daily_earning * $reductionRatio;
                    $activePackage->save();
                }
            }
    
            // Prepare package update details
            $now = now();
            $newDailyEarning = $packageEarnings[$userRequest->package] ?? 1.50;
    
            // Update package details
            $updateResult = $package->update([
                'status' => 'active',
                'activation_date' => $now,
                'expiration_date' => $now->copy()->addYear(),
                'daily_earning' => $newDailyEarning,
                'last_earning_update' => $now,
            ]);
    
            // Schedule Price Increase Job
            PackagePriceIncreaseJob::dispatch($package->id)
                ->delay($now->copy()->addHours(24));
    
            // Update User Request Status
            $userRequest->update([
                'status' => 'approved',
                'processed_at' => $now
            ]);
    
            // Process Referral
            $this->processReferralReward($userRequest);
    
            DB::commit();
            return redirect()->back()->with('success', 'Request approved successfully');
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Package Approval Failed', [
                'error' => $e->getMessage(),
                'user_id' => $userRequest->user_id,
                'package' => $userRequest->package
            ]);
            return redirect()->back()->with('error', 'Failed to approve package.');
        }
    }
    
    
    protected function handleRejectedRequest($userRequest)
    {
        // Update the request status instead of deleting
        $userRequest->update([
            'status' => 'rejected',
            'processed_at' => now()
        ]);
    
        return redirect()->back()->with('warning', 'Request rejected');
    }
    
    
    
    protected function processReferralReward($userRequest)
    {
        $referredUser = User::find($userRequest->user_id);
    
        // Check if user has a referrer
        if (!$referredUser || !$referredUser->referrer_id) {
            return;
        }
    
        // Count how many approved packages this user already has
        $approvedPackagesCount = user_packages::where('user_id', $userRequest->user_id)
            ->where('status', 'active')
            ->count();
    
        // Only process referral reward if this is their first approved package
        if ($approvedPackagesCount === 1) {  // This means it's their first package
            $referrer = User::find($referredUser->referrer_id);
            
            if ($referrer) {
                // Add reward to referrer's wallet
                $referrer->wallet_balance += 10;
                $referrer->save();
    
                // Create transaction record
                ReferralTransaction::create([
                    'referrer_id' => $referrer->id,
                    'referred_user_id' => $referredUser->id,
                    'reward_amount' => 10,
                    'status' => 'completed'
                ]);
            }
        }
    }
    
}
