<?php

namespace App\Filament\Resources\PermissionResource\Widgets;

use App\Models\WebStatistic;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function WebStats($attribute)
    {
        $stats = WebStatistic::where('attribute', $attribute)->first();

        return $stats->value;
    }

    protected function getCards(): array
    {
        return [
            Card::make('Total Roles', $this->WebStats('roles')),
            Card::make('Total Permissions', $this->WebStats('permissions')),
        ];
    }
}
