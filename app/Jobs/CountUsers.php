<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\WebStatistic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CountUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __invoke()
    {
        $stats = WebStatistic::where('attribute', 'users')->first();
        $stats->saveCount('users', User::count());
    }
}
