<?php

namespace App\Jobs;

use App\Models\user_packages;
use App\Models\UserPackage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PackagePriceIncreaseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $packageId;
    protected $packageEarnings = [
        'Bronze Starter' => 1.50,
        'Silver Saver' => 3.00,
        'Golden Opportunity' => 4.50,
        'Platinum Plus' => 6.00,
        'Diamond Elite' => 10.00,
        'Emerald Advantage' => 25.00,
        'Ruby Reward' => 40.00,
        'Sapphire Pro' => 100.00,
        'Titanium Master' => 150.00,
        'Infinity Legend' => 350.00
    ];

    public function __construct($packageId)
    {
        $this->packageId = $packageId;
    }

    public function handle()
    {
        $package = user_packages::findOrFail($this->packageId);
        
        // Log the current state
        Log::info('Processing Package Increase', [
            'package_id' => $package->id,
            'current_time' => now(),
            'activation_date' => $package->activation_date,
            'current_daily_earning' => $package->daily_earning,
            'status' => $package->status
        ]);

        // Check if package has expired
        if (now()->gt($package->expiration_date)) {
            $package->update([
                'status' => 'expired',
                'daily_earning' => 0
            ]);
            
            Log::info('Package Expired', [
                'package_id' => $package->id,
                'package_name' => $package->package_name,
                'expiration_date' => $package->expiration_date
            ]);
            
            return;
        }

        // Verify package is active
        if ($package->status !== 'active') {
            Log::info('Package not active', [
                'package_id' => $package->id,
                'status' => $package->status
            ]);
            return;
        }

        // Get base daily earning for this package type
        $baseEarning = $this->packageEarnings[$package->package_name] ?? 1.50;
        
        // Calculate new daily earning
        $oldEarning = $package->daily_earning;
        $newEarning = $oldEarning + $baseEarning;
        
        // Update package daily earning
        $package->update([
            'daily_earning' => $newEarning,
            'last_earning_update' => now()
        ]);

        Log::info('Package Daily Earning Increased', [
            'package_id' => $package->id,
            'package_name' => $package->package_name,
            'old_earning' => $oldEarning,
            'new_earning' => $newEarning,
            'next_update' => now()->addDay()
        ]);

        // Schedule next increase
        if ($package->status === 'active' && now()->lt($package->expiration_date)) {
            // Schedule exactly 24 hours from now
            self::dispatch($package->id)
                ->delay(now()->addHours(24));
        }
    }
}
