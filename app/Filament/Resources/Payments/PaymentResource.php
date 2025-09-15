<?php

namespace App\Filament\Resources\Payments;

use App\Filament\Resources\Payments\Pages\ManagePayments;
use App\Models\Payment;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CreditCard;

    protected static ?string $recordTitleAttribute = 'reference';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('reference')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('currency')
                    ->required(),
                Select::make('provider')
                    ->options(['stripe' => 'Stripe', 'paypal' => 'Paypal'])
                    ->required(),
                Select::make('method')
                    ->options(['credit card' => 'Credit card', 'bank transfer' => 'Bank transfer', 'paypal' => 'Paypal'])
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('reference'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('currency'),
                TextEntry::make('provider')
                    ->badge(),
                TextEntry::make('method')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('reference')
            ->columns([
                TextColumn::make('reference')
                    ->searchable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('currency')
                    ->searchable(),
                TextColumn::make('provider')
                    ->badge(),
                TextColumn::make('method')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePayments::route('/'),
        ];
    }
}
