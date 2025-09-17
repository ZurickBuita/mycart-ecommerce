<?php

namespace App\Filament\Resources\Orders\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Number;

class OrderOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '10s';
    protected function getStats(): array
    {
        $statuses = ['new', 'processing', 'shipped', 'delivered'];

        $counts = Order::query()
            ->selectRaw('status, COUNT(*) as total')
            ->whereIn('status', $statuses)
            ->groupBy('status')
            ->pluck('total', 'status');

        return [
            Stat::make('New Orders', $counts->get('new', 0)),
            Stat::make('Order Processing', $counts->get('processing', 0)),
            Stat::make('Shipped', $counts->get('shipped', 0)),
            Stat::make('Delivered', $counts->get('delivered', 0)),
        ];

    }
}
