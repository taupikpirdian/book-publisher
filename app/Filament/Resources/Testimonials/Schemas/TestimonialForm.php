<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->default(null),
                TextInput::make('photo_path')
                    ->label('Photo URL')
                    ->placeholder('Masukkan URL gambar dari Asset Images')
                    ->url()
                    ->default(null),
                Textarea::make('testimonial')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('book_title')
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
