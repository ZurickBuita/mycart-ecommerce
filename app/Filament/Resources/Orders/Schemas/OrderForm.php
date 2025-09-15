<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatus;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Information')
                    ->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->required()
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload(),
                        Select::make('payment_method')
                            ->options([
                                'cash on delivery' => 'Cash on delivery',
                                'credit card' => 'Credit card',
                                'bank transfer' => 'Bank transfer',
                                'paypal' => 'Paypal',
                            ])
                            ->default('cash on delivery')
                            ->required(),
                        Select::make('payment_status')
                            ->options(['pending' => 'Pending', 'paid' => 'Paid', 'failed' => 'Failed'])
                            ->default('pending')
                            ->required(),
                        ToggleButtons::make('status')
                            ->inline()
                            ->options(OrderStatus::class)
                            ->required(),
                        Select::make('currency')
                            ->options(['php' => 'PHP', 'usd' => 'USD', 'eur' => 'EUR', 'cad' => 'CAD'])
                            ->default('php')
                            ->required(),
                        Select::make('shipping_method')
                            ->options(['standard' => 'Standard', 'express' => 'Express', 'pick-up' => 'Pick up'])
                            ->default('standard')
                            ->required(),
                        Textarea::make('notes')
                            ->nullable()
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Order Items')->schema([
                    Repeater::make('orderItems')
                        ->schema([
                            TextInput::make('quantity')
                                ->required()
                                ->numeric(),
                            TextInput::make('unit_amount')
                                ->required()
                                ->numeric(),
                            TextInput::make('total_amount')
                                ->required()
                                ->numeric(),
                        ])
                        ->columns(4),
                ])
            ])->columns(1);
    }
}
