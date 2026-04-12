<?php

namespace App\Filament\Resources\Books\Schemas;

use App\Models\Author;
use App\Models\Category;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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
                Select::make('author_id')
                    ->label('Author')
                    ->options(fn() => Author::where('is_active', true)->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('category_id')
                    ->label('Category')
                    ->options(fn() => Category::where('type', Category::TYPE_BOOK)->where('is_active', true)->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('cover_image')
                    ->label('Cover Image URL')
                    ->placeholder('Masukkan URL gambar dari Asset Images')
                    ->url()
                    ->default(null),
                RichEditor::make('synopsis')
                    ->label('Synopsis')
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
