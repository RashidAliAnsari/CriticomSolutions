<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum NoteStatus: string implements HasColor, HasLabel
{
    case Active = 'active';
    case Parked = 'parked';
    case Done = 'done';

    public function getLabel(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Parked => 'Parked',
            self::Done => 'Done',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Active => 'success',
            self::Parked => 'warning',
            self::Done => 'gray',
        };
    }
}
