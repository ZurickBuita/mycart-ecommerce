<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatus;
use App\Filament\Resources\Orders\OrderResource;
use App\Models\Order;
use Filament\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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
                    ->label('Order ID')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('grand_total')
                    ->money('php')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('payment_method')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->badge(),
                TextColumn::make('payment_status')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->badge(),
                SelectColumn::make('status')
                    ->options(OrderStatus::class)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Order Date')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->since()
                    ->dateTimeTooltip(),
            ])
            ->filters([
                SelectFilter::make('payment_method')
                    ->options([
                        'cash on delivery' => 'Cash on delivery',
                        'credit card' => 'Credit card',
                        'bank transfer' => 'Bank transfer',
                        'paypal' => 'Paypal',
                        'stripe' => 'Stripe',
                    ])
                    ->preload()
                    ->multiple(),
                SelectFilter::make('payment_status')
                    ->options([
                        'paid' => 'Paid',
                        'pending' => 'Pending',
                        'failed' => 'Failed',
                    ])
                    ->preload()
                    ->multiple(),
                SelectFilter::make('status')
                    ->options(OrderStatus::class)
                    ->preload()
                    ->multiple(),
            ])
            ->recordActions([
                Action::make('View Order')
                    ->label('')
                    ->url(fn(Order $record): string => OrderResource::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-m-pencil')
            ]);
    }
}
