<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('author_id')
                    ->required()
                    ->numeric(),
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                FileUpload::make('cover_image')
                    ->image(),
                Textarea::make('synopsis')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('isbn')
                    ->default(null),
                TextInput::make('publisher')
                    ->default(null),
                DatePicker::make('published_at'),
                TextInput::make('pages')
                    ->numeric()
                    ->default(null),
                TextInput::make('language')
                    ->required()
                    ->default('Indonesia'),
                TextInput::make('dimensions')
                    ->default(null),
                TextInput::make('weight')
                    ->default(null),
                TextInput::make('cover_type')
                    ->required()
                    ->default('Soft Cover'),
                Toggle::make('is_bestseller')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
