<?php

namespace App\Filament\Widgets;

use App\Enums\EnquiryStatus;
use App\Models\Enquiry;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NewEnquiriesWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $count = Enquiry::query()->where('status', EnquiryStatus::New)->count();

        return [
            Stat::make('New enquiries', $count)
                ->description('Awaiting first review')
                ->color($count > 0 ? 'warning' : 'success'),
        ];
    }
}
