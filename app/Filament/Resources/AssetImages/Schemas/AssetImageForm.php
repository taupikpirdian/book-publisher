<?php

namespace App\Filament\Resources\AssetImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class AssetImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('file_path')
                    ->label('Image')
                    ->image()
                    ->directory('assets/images')
                    ->disk('public')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/*'])
                    ->afterStateHydrated(function (FileUpload $component, string|array|null $state): void {
                        if (is_string($state)) {
                            $component->state([basename($state) => $state]);
                        }
                    })
                    ->dehydrateStateUsing(function (string|array|null $state): ?string {
                        if (is_array($state)) {
                            return reset($state);
                        }
                        return $state;
                    })
                    ->getUploadedFileUsing(function (FileUpload $component, string $file, string|array|null $storedFileNames): ?array {
                        $record = $component->getRecord();

                        if ($record && $record->uuid) {
                            return [
                                'name' => basename($file),
                                'size' => 0,
                                'type' => null,
                                'url' => url('/v2/assets/images/' . $record->uuid),
                            ];
                        }

                        return null;
                    })
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
