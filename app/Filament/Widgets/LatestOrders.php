<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatus;
use App\Filament\Resources\Orders\OrderResource;
use App\Models\Order;
use Filament\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestOrders extends TableWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('Order ID'),
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable(),
                TextColumn::make('grand_total'),
                TextColumn::make('payment_method')
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->sortable()
                    ->badge(),
                SelectColumn::make('status')
                    ->options(OrderStatus::class)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Order Date'),
            ])
            ->recordActions([
                Action::make('View Order')
                    ->url(fn(Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-m-eye')
            ]);
    }
}
