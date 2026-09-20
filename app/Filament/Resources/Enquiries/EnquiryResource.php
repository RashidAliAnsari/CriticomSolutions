<?php

namespace App\Filament\Resources\Enquiries;

use App\Enums\EnquiryStatus;
use App\Filament\Resources\Enquiries\Pages\ListEnquiries;
use App\Filament\Resources\Enquiries\Pages\ViewEnquiry;
use App\Filament\Resources\Enquiries\Schemas\EnquiryInfolist;
use App\Filament\Resources\Enquiries\Tables\EnquiriesTable;
use App\Models\Enquiry;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // Enquiries only ever arrive via the public contact form — see CLAUDE.md §13.1.
    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return EnquiryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnquiriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEnquiries::route('/'),
            'view' => ViewEnquiry::route('/{record}'),
        ];
    }

    /**
     * Quick actions to move an enquiry through its status, shared between the
     * table row actions and the view page header actions.
     *
     * @return array<Action>
     */
    public static function statusActions(): array
    {
        return collect([EnquiryStatus::Read, EnquiryStatus::Replied, EnquiryStatus::Archived])
            ->map(fn (EnquiryStatus $status) => Action::make('mark-'.$status->value)
                ->label('Mark '.$status->getLabel())
                ->color($status->getColor())
                ->visible(fn (Enquiry $record): bool => $record->status !== $status)
                ->action(fn (Enquiry $record) => $record->update(['status' => $status])))
            ->values()
            ->all();
    }
}
