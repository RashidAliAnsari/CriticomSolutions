<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Notes\NoteResource;
use App\Models\Note;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class UpcomingNoteActionsWidget extends TableWidget
{
    protected static ?string $heading = 'Next actions due within 7 days';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Note::query()
                ->whereNotNull('next_action_date')
                ->whereBetween('next_action_date', [now()->toDateString(), now()->addDays(7)->toDateString()]))
            ->defaultSort('next_action_date')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('next_action')
                    ->label('Next action')
                    ->placeholder('—'),
                TextColumn::make('next_action_date')
                    ->label('Due')
                    ->date(),
            ])
            ->recordActions([
                Action::make('open')
                    ->label('Open')
                    ->url(fn (Note $record): string => NoteResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
