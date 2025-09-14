<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('number'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('currency'),
                TextEntry::make('country'),
                TextEntry::make('total_price')
                    ->numeric(),
                TextEntry::make('street_address'),
                TextEntry::make('city'),
                TextEntry::make('state_province'),
                TextEntry::make('zip_postalcode'),
                TextEntry::make('notes'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
