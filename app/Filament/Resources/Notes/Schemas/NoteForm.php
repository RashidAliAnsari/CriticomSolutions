<?php

namespace App\Filament\Resources\Notes\Schemas;

use App\Enums\NoteStatus;
use App\Enums\NoteType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class NoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('Content here is stored on shared hosting. Do not include material under NDA or covered by client confidentiality.')
                    ->icon(Heroicon::OutlinedExclamationTriangle)
                    ->color('warning')
                    ->visible(fn (string $operation): bool => $operation === 'create')
                    ->columnSpanFull(),

                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Select::make('type')
                            ->options(collect(NoteType::cases())
                                ->mapWithKeys(fn (NoteType $type) => [$type->value => $type->getLabel()])
                                ->all())
                            ->required(),

                        Select::make('status')
                            ->options(collect(NoteStatus::cases())
                                ->mapWithKeys(fn (NoteStatus $status) => [$status->value => $status->getLabel()])
                                ->all())
                            ->required()
                            ->default(NoteStatus::Active->value),

                        TagsInput::make('tags')
                            ->columnSpanFull(),

                        MarkdownEditor::make('body')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Opportunity and follow-up')
                    ->description('Optional — fill in when this note has a value or a next step attached.')
                    ->columns(3)
                    ->schema([
                        TextInput::make('value')
                            ->numeric()
                            ->label('Value'),

                        TextInput::make('next_action')
                            ->maxLength(255)
                            ->label('Next action'),

                        DatePicker::make('next_action_date')
                            ->label('Next action date'),
                    ]),
            ]);
    }
}
