<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('type')
                    ->options(['book' => 'Book', 'faq' => 'Faq'])
                    ->default('book')
                    ->required(),
                TextInput::make('description')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
