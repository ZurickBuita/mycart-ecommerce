<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()->schema([
                    Section::make('Product Information')
                        ->schema([
                            Group::make()->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                                TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                                MarkdownEditor::make('description')
                                    ->required()
                                    ->fileAttachmentsDirectory('products-description-image')
                                    ->fileAttachmentsDisk('public')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        ]),
                    Section::make('Images')
                        ->schema([
                            FileUpload::make('images')
                                ->image()
                                ->disk('public')
                                ->directory('product-category')
                                ->multiple()
                                ->required(),
                        ]),
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make('Price')
                        ->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->default(0.0),
                        ]),
                    Section::make('Association')
                        ->schema([
                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload(),
                            Select::make('brand_id')
                                ->relationship('brand', 'name')
                                ->searchable()
                                ->preload(),
                        ]),
                    Section::make('Status')
                        ->schema([
                            Toggle::make('in_stock')
                                ->required(),
                            Toggle::make('is_active')
                                ->required(),
                            Toggle::make('is_feature')
                                ->required(),
                            Toggle::make('on_sale')
                                ->required(),
                        ]),
                ])->columnSpan(1),
            ])->columns(3);
    }
}
