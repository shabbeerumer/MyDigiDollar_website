<?php 
namespace App\Services;

use App\Models\User;
use App\Models\WithdrawRequest;
use App\Models\ReferralTransaction;
use App\Models\user_packages;
use Illuminate\Support\Facades\Log;

class EarningsService
{
    // Package Pricing Configuration
    protected $packages = [
        'Bronze Starter' => ['price' => 100, 'daily_earning' => 1.50],
        'Silver Saver' => ['price' => 200, 'daily_earning' => 3.00],
        'Golden Opportunity' => ['price' => 300, 'daily_earning' => 4.50],
        'Plantinum Plus' => ['price' => 400, 'daily_earning' => 6.00],
        'Diamond Elite' => ['price' => 500, 'daily_earning' => 10.00],
        'Emerald Advantage' => ['price' => 1000, 'daily_earning' => 25.00],
        'Ruby Reward' => ['price' => 1500, 'daily_earning' => 40.00],
        'Sapphire Pro' => ['price' => 3000, 'daily_earning' => 100.00],
        'Titanium Master' => ['price' => 5000, 'daily_earning' => 150.00],
        'Infinity Legend' => ['price' => 10000, 'daily_earning' => 350.00]
    ];

    public function processPackageEarnings(User $user)
    {
        $totalEarnings = $this->calculateTotalEarnings($user);
        $eligiblePackages = $this->findEligiblePackages($totalEarnings);
        $totalDeduction = $this->calculateDeductionAmount($eligiblePackages);
        
        // Ensure deduction doesn't exceed total earnings
        $finalDeduction = min($totalDeduction, $totalEarnings);

        // Log the process
        Log::info('Package Earnings Processing', [
            'user_id' => $user->id,
            'total_earnings' => $totalEarnings,
            'eligible_packages' => array_keys($eligiblePackages),
            'total_deduction' => $finalDeduction
        ]);

        return [
            'total_earnings' => $totalEarnings,
            'eligible_packages' => $eligiblePackages,
            'total_deduction' => $finalDeduction
        ];
    }

    protected function calculateTotalEarnings(User $user)
    {
        // Calculate total earnings from various sources
        $packageEarnings = user_packages::where('user_id', $user->id)
            ->where('status', 'active')
            ->sum('daily_earning');

        $referralEarnings = ReferralTransaction::where('referrer_id', $user->id)
            ->where('status', 'completed')
            ->sum('reward_amount');

        $bonusEarning = $user->has_received_bonus ? 5 : 0;

        // Calculate initial total
        $totalEarnings = $packageEarnings + $referralEarnings + $bonusEarning;

        // Get the latest active package
        $latestPackage = user_packages::where('user_id', $user->id)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->first();

        // If there's a new package and total earnings is greater than its price
        if ($latestPackage && isset($this->packages[$latestPackage->package_name])) {
            $packagePrice = $this->packages[$latestPackage->package_name]['price'];
            if ($totalEarnings > $packagePrice) {
                $totalEarnings -= $packagePrice;
            }
        }

        // Subtract withdrawals
        $withdrawnAmount = WithdrawRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->sum('withdraw_amount');

        return $totalEarnings - $withdrawnAmount;
    }

    protected function findEligiblePackages($totalEarnings)
    {
        return array_filter($this->packages, function($package) use ($totalEarnings) {
            return $totalEarnings >= $package['price'];
        });
    }

    protected function calculateDeductionAmount($eligiblePackages)
    {
        return array_sum(array_column($eligiblePackages, 'price'));
    }
}
