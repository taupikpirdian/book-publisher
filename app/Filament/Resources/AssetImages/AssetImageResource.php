<?php

namespace App\Filament\Resources\AssetImages;

use App\Filament\Resources\AssetImages\Pages\CreateAssetImage;
use App\Filament\Resources\AssetImages\Pages\EditAssetImage;
use App\Filament\Resources\AssetImages\Pages\ListAssetImages;
use App\Filament\Resources\AssetImages\Schemas\AssetImageForm;
use App\Filament\Resources\AssetImages\Tables\AssetImagesTable;
use App\Models\AssetImage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AssetImageResource extends Resource
{
    protected static ?string $model = AssetImage::class;

    public static function getNavigationIcon(): string|Heroicon
    {
        return Heroicon::OutlinedPhoto;
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }

    public static function getModelLabel(): string
    {
        return 'Asset Image';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Asset Images';
    }

    public static function form(Schema $schema): Schema
    {
        return AssetImageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetImagesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAssetImages::route('/'),
            'create' => CreateAssetImage::route('/create'),
            'edit' => EditAssetImage::route('/{record}/edit'),
        ];
    }
}
