<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Enums\OrderStatus;
use App\Filament\Resources\Orders\OrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    protected static ?string $relatedResource = OrderResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Order ID')
                    ->sortable(),
                TextColumn::make('payment_method'),
                TextColumn::make('payment_status')
                    ->badge(),
                SelectColumn::make('status')
                    ->options(OrderStatus::class),
                TextColumn::make('currency')
                    ->formatStateUsing(fn(string $state) => strtoupper($state)),
                TextColumn::make('created_at')
                    ->label('Order Date'),
            ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
