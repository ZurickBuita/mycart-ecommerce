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
                TextEntry::make('payment_method')
                    ->badge(),
                TextEntry::make('payment_status')
                    ->badge(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('currency')
                    ->badge(),
                TextEntry::make('shipping_method')
                    ->badge(),
                TextEntry::make('notes')
                    ->placeholder('-'),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
