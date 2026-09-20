<?php

namespace App\Filament\Resources\Enquiries\Pages;

use App\Filament\Resources\Enquiries\EnquiryResource;
use App\Models\Enquiry;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ViewRecord;

class ViewEnquiry extends ViewRecord
{
    protected static string $resource = EnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('editNotes')
                ->label('Edit notes')
                ->color('gray')
                ->schema([
                    Textarea::make('notes')
                        ->label('Internal notes')
                        ->helperText('Not shown to the enquirer.')
                        ->rows(6),
                ])
                ->fillForm(fn (Enquiry $record): array => [
                    'notes' => $record->notes,
                ])
                ->action(function (Enquiry $record, array $data): void {
                    $record->update(['notes' => $data['notes']]);
                }),
            ...EnquiryResource::statusActions(),
        ];
    }
}
