<?php

namespace App\Filament\Resources\Faqs\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                    ->required(),
                Textarea::make('answer')
                    ->required()
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->label('Category')
                    ->options(fn() => Category::where('type', Category::TYPE_FAQ)->where('is_active', true)->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->default(null),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
            ]);
    }
}
