@props([
    'value',
    'label',
    'dark' => false,
])

@php
    $borderColor = $dark ? 'border-white/20' : 'border-line';
    $valueColor = $dark ? 'text-paper' : 'text-ink';
@endphp

<div {{ $attributes->merge(['class' => "border-t pt-4 $borderColor"]) }}>
    <p class="text-2xl font-semibold tracking-tight {{ $valueColor }}">{{ $value }}</p>
    <x-mono-label :dark="$dark" class="mt-2 block">{{ $label }}</x-mono-label>
</div>
