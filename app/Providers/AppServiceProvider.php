<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
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
    }
}
