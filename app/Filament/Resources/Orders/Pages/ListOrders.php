<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use App\Filament\Resources\Orders\Widgets\OrderOverview;
use App\Models\Order;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'New' => Tab::make()
                ->query(fn($query) => $query->where('status', 'new'))
                ->icon('heroicon-m-sparkles'),
            'Processing' => Tab::make()
                ->query(fn($query) => $query->where('status', 'processing'))
                ->icon('heroicon-m-arrow-path'),
            'Shipped' => Tab::make()
                ->query(fn($query) => $query->where('status', 'shipped'))
                ->icon('heroicon-m-truck'),
            'Delivered' => Tab::make()
                ->query(fn($query) => $query->where('status', 'delivered'))
                ->icon('heroicon-m-check-badge'),
            'Cancelled' => Tab::make()
                ->query(fn($query) => $query->where('status', 'cancelled'))
                ->icon('heroicon-m-x-circle')
                ->badge(Order::query()->where('status', 'cancelled')->count()),
        ];
    }
}
