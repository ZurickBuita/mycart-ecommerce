<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('reference')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Select::make('provider')
                    ->options(['stripe' => 'Stripe', 'paypal' => 'Paypal'])
                    ->required(),
                Select::make('method')
                    ->options(['credit card' => 'Credit card', 'bank transfer' => 'Bank transfer', 'paypal' => 'Paypal'])
                    ->required(),
            ]);
    }
}
