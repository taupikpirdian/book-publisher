<?php

namespace App\Filament\Resources\AssetImages\Pages;

use App\Filament\Resources\AssetImages\AssetImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetImage extends EditRecord
{
    protected static string $resource = AssetImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
