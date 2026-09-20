<?php

namespace App\Filament\Resources\Enquiries\Tables;

use App\Enums\EnquiryStatus;
use App\Filament\Resources\Enquiries\EnquiryResource;
use Filament\Actions\ActionGroup;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EnquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('company')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),
                TextColumn::make('email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('sector_label')
                    ->label('Sector')
                    ->placeholder('—'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options(collect(EnquiryStatus::cases())
                        ->mapWithKeys(fn (EnquiryStatus $status) => [$status->value => $status->getLabel()])
                        ->all()),
            ])
            ->recordActions([
                ViewAction::make(),
                ActionGroup::make(EnquiryResource::statusActions()),
            ]);
    }
}
