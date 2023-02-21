<?php

namespace App\Providers;

use Filament\Forms;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Health::checks([
            CacheCheck::new(),
            OptimizedAppCheck::new(),
            UsedDiskSpaceCheck::new(),
            DatabaseCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            ScheduleCheck::new(),
            SecurityAdvisoriesCheck::new(),
        ]);
    }

    public function boot()
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()->label('Accounts'),
                NavigationGroup::make()->label('Logs')->collapsed(),
                NavigationGroup::make()->label('Settings')->collapsed(),
                NavigationGroup::make()->label('System')->collapsed(),
            ]);
        });
        Forms\Components\Card::configureUsing(function (Forms\Components\Card $card): void {
            $card->columns(1);
        });
    }
}
