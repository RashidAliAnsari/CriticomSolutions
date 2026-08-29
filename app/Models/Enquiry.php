<?php

namespace App\Models;

use App\Enums\EnquiryStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'sector',
        'message',
        'ip_address',
        'status',
        'notes',
    ];

    protected $casts = [
        'status' => EnquiryStatus::class,
    ];

    /**
     * Human-readable sector title from config/site_sectors.php, falling back to
     * the stored slug if it no longer matches a configured sector.
     */
    protected function sectorLabel(): Attribute
    {
        return Attribute::make(
            get: function (): ?string {
                if (blank($this->sector)) {
                    return null;
                }

                $match = collect(config('site_sectors'))->firstWhere('slug', $this->sector);

                return $match['nav_title'] ?? $this->sector;
            },
        );
    }
}
