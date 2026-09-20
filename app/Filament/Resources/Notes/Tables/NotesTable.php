<?php

namespace App\Filament\Resources\Notes\Tables;

use App\Enums\NoteStatus;
use App\Enums\NoteType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class NotesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('body')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('tags')
                    ->badge(),
                TextColumn::make('value')
                    ->numeric(decimalPlaces: 2)
                    ->placeholder('—')
                    ->sortable(),
                TextColumn::make('next_action')
                    ->label('Next action')
                    ->placeholder('—'),
                TextColumn::make('next_action_date')
                    ->label('Next action date')
                    ->date()
                    ->placeholder('—')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                SelectFilter::make('type')
                    ->options(collect(NoteType::cases())
                        ->mapWithKeys(fn (NoteType $type) => [$type->value => $type->getLabel()])
                        ->all()),
                SelectFilter::make('status')
                    ->options(collect(NoteStatus::cases())
                        ->mapWithKeys(fn (NoteStatus $status) => [$status->value => $status->getLabel()])
                        ->all()),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
