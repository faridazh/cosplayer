<?php

namespace App\Console;

use App\Jobs\CountPermissions;
use App\Jobs\CountRoles;
use App\Jobs\CountUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(CountUsers::dispatch())->daily();
        $schedule->job(CountRoles::dispatch())->daily();
        $schedule->job(CountPermissions::dispatch())->daily();
        $schedule->command('activitylog:clean')->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
