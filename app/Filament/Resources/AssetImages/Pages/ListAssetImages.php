<?php

namespace App\Filament\Resources\AssetImages\Pages;

use App\Filament\Resources\AssetImages\AssetImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetImages extends ListRecords
{
    protected static string $resource = AssetImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
