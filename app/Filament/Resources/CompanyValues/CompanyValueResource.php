<?php

namespace App\Filament\Resources\CompanyValues;

use App\Filament\Resources\CompanyValues\Pages\CreateCompanyValue;
use App\Filament\Resources\CompanyValues\Pages\EditCompanyValue;
use App\Filament\Resources\CompanyValues\Pages\ListCompanyValues;
use App\Filament\Resources\CompanyValues\Schemas\CompanyValueForm;
use App\Filament\Resources\CompanyValues\Tables\CompanyValuesTable;
use App\Models\CompanyValue;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompanyValueResource extends Resource
{
    protected static ?string $model = CompanyValue::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CompanyValueForm::configure($schema);
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }

    public static function table(Table $table): Table
    {
        return CompanyValuesTable::configure($table);
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
            'index' => ListCompanyValues::route('/'),
            'create' => CreateCompanyValue::route('/create'),
            'edit' => EditCompanyValue::route('/{record}/edit'),
        ];
    }
}
