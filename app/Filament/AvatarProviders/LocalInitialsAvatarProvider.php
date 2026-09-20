<?php

namespace App\Filament\AvatarProviders;

use Filament\AvatarProviders\Contracts\AvatarProvider;
use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Database\Eloquent\Model;

/**
 * Renders initials as an inline data: URI SVG — no external request, unlike
 * Filament's default UiAvatarsProvider (ui-avatars.com), which the admin
 * CSP's img-src blocks (CLAUDE.md §13.3).
 */
class LocalInitialsAvatarProvider implements AvatarProvider
{
    public function get(Model $record): string
    {
        $initials = str(Filament::getNameForDefaultAvatar($record))
            ->trim()
            ->explode(' ')
            ->map(fn (string $segment): string => filled($segment) ? mb_substr($segment, 0, 1) : '')
            ->join('');

        $background = Color::convertToHex(FilamentColor::getColor('gray')[950] ?? Color::Gray[950]);

        $svg = sprintf(
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">'
            .'<rect width="40" height="40" fill="%s" />'
            .'<text x="50%%" y="50%%" dy=".35em" fill="#ffffff" font-family="sans-serif" font-size="16" text-anchor="middle">%s</text>'
            .'</svg>',
            $background,
            e($initials)
        );

        return 'data:image/svg+xml;base64,'.base64_encode($svg);
    }
}
