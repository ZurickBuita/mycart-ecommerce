<?php

namespace App\Filament\Resources\Orders\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

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
            Stat::make('New Orders', $counts->get('new', 0))
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('info'),
            Stat::make('Order Processing', $counts->get('processing', 0))
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make('Shipped', $counts->get('shipped', 0))
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Delivered', $counts->get('delivered', 0))
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
        ];

    }
}
