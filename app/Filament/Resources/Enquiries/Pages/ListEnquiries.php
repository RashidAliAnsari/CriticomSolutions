<?php

namespace App\Filament\Resources\Enquiries\Pages;

use App\Filament\Resources\Enquiries\EnquiryResource;
use Filament\Resources\Pages\ListRecords;

class ListEnquiries extends ListRecords
{
    protected static string $resource = EnquiryResource::class;

    // No create action — enquiries only arrive via the public contact form.
    protected function getHeaderActions(): array
    {
        return [];
    }
}
