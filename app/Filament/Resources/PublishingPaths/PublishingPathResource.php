<?php

namespace App\Filament\Resources\PublishingPaths;

use App\Filament\Resources\PublishingPaths\Pages\CreatePublishingPath;
use App\Filament\Resources\PublishingPaths\Pages\EditPublishingPath;
use App\Filament\Resources\PublishingPaths\Pages\ListPublishingPaths;
use App\Filament\Resources\PublishingPaths\Schemas\PublishingPathForm;
use App\Filament\Resources\PublishingPaths\Tables\PublishingPathsTable;
use App\Models\PublishingPath;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PublishingPathResource extends Resource
{
    protected static ?string $model = PublishingPath::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }

    public static function form(Schema $schema): Schema
    {
        return PublishingPathForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PublishingPathsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPublishingPaths::route('/'),
            'create' => CreatePublishingPath::route('/create'),
            'edit' => EditPublishingPath::route('/{record}/edit'),
        ];
    }
}
