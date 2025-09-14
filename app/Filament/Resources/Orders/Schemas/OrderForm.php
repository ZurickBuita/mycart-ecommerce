<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->required(),
                Select::make('status')
                    ->options([
            'new' => 'New',
            'processing' => 'Processing',
            'shipped' => 'Shipped',
            'delivered' => 'Delivered',
            'cancelled' => 'Cancelled',
        ])
                    ->default('new')
                    ->required(),
                TextInput::make('currency')
                    ->required(),
                TextInput::make('country')
                    ->required(),
                TextInput::make('total_price')
                    ->required()
                    ->numeric(),
                TextInput::make('street_address')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('state_province')
                    ->required(),
                TextInput::make('zip_postalcode')
                    ->required(),
                TextInput::make('notes')
                    ->required(),
            ]);
    }
}
