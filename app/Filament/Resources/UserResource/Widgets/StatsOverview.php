<?php

namespace App\Filament\Resources\UserResource\Widgets;

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
            Card::make('Total Users', $this->WebStats('users')),
        ];
    }
}
