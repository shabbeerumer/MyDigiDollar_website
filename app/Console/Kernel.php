<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // protected function schedule(Schedule $schedule)
    // {
    //     $schedule->command('queue:work --stop-when-empty')
    //         ->hourly()
    //         ->withoutOverlapping();

    // }
protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        Log::info("Scheduled task executed successfully at: " . now());
    })->everyMinute();
}


}
