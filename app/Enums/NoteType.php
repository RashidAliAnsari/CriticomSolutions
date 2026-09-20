<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum NoteType: string implements HasColor, HasLabel
{
    case Idea = 'idea';
    case Opportunity = 'opportunity';
    case Contact = 'contact';
    case Reference = 'reference';

    public function getLabel(): string
    {
        return match ($this) {
            self::Idea => 'Idea',
            self::Opportunity => 'Opportunity',
            self::Contact => 'Contact',
            self::Reference => 'Reference',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Idea => 'info',
            self::Opportunity => 'success',
            self::Contact => 'warning',
            self::Reference => 'gray',
        };
    }
}
