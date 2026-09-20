<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Enquiry')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('company')
                            ->placeholder('—'),
                        TextEntry::make('email')
                            ->copyable(),
                        TextEntry::make('phone')
                            ->placeholder('—'),
                        TextEntry::make('sector_label')
                            ->label('Sector')
                            ->placeholder('—'),
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('created_at')
                            ->label('Received')
                            ->dateTime('d M Y, H:i'),
                        TextEntry::make('ip_address')
                            ->label('IP address')
                            ->placeholder('—'),
                    ]),
                Section::make('Message')
                    ->schema([
                        TextEntry::make('message')
                            ->hiddenLabel()
                            ->prose(),
                    ]),
                Section::make('Internal notes')
                    ->description('Not shown to the enquirer. Edited via the header action above.')
                    ->schema([
                        TextEntry::make('notes')
                            ->hiddenLabel()
                            ->placeholder('No notes yet.')
                            ->prose(),
                    ]),
            ]);
    }
}
