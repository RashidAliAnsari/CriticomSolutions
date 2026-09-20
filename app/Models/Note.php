<?php

namespace App\Models;

use App\Enums\NoteStatus;
use App\Enums\NoteType;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'body',
        'type',
        'tags',
        'status',
        'value',
        'next_action',
        'next_action_date',
    ];

    protected $casts = [
        'type' => NoteType::class,
        'status' => NoteStatus::class,
        'tags' => 'array',
        'value' => 'decimal:2',
        'next_action_date' => 'date',
    ];
}
