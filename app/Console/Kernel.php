<?php

namespace App\Console;

use App\Jobs\CountCosplayers;
use App\Jobs\CountPermissions;
use App\Jobs\CountPosts;
use App\Jobs\CountRoles;
use App\Jobs\CountUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\Health\Commands\RunHealthChecksCommand;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // Web Stats Counter
        $schedule->job(CountUsers::class)->everyMinute();
        $schedule->job(CountRoles::class)->everyMinute();
        $schedule->job(CountPermissions::class)->everyMinute();
        $schedule->job(CountPosts::class)->everyMinute();
        $schedule->job(CountCosplayers::class)->everyMinute();
        // Activity Logs
        $schedule->command('activitylog:clean')->monthly();
        // Spatie Health
        $schedule->command(RunHealthChecksCommand::class)->everyFiveMinutes();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
