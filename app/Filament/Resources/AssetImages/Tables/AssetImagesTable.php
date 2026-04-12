<?php

namespace App\Filament\Resources\AssetImages\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('url')
                    ->label('Preview')
                    ->square()
                    ->size(64),
                TextColumn::make('file_type')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('file_size')
                    ->formatStateUsing(fn (?int $state): string => match (true) {
                        $state === null => '—',
                        $state < 1024 => $state . ' B',
                        $state < 1048576 => round($state / 1024, 2) . ' KB',
                        $state < 1073741824 => round($state / 1048576, 2) . ' MB',
                        default => round($state / 1073741824, 2) . ' GB',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('copyUrl')
                    ->label('Copy URL')
                    ->icon('heroicon-o-clipboard-document')
                    ->color('success')
                    ->action(function ($livewire, $record) {
                        $url = $record->url;
                        $livewire->js(
                            "navigator.clipboard.writeText('{$url}')
                                .then(() => {
                                    window.Livewire.dispatch('notify', {
                                        type: 'success',
                                        message: 'URL berhasil disalin ke clipboard!'
                                    });
                                })"
                        );
                    })
                    ->successNotificationTitle('URL berhasil disalin ke clipboard!'),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
