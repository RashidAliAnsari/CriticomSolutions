@props([
    'href' => null,
    'variant' => 'primary',
    'dark' => false,
])

@php
    $base = 'inline-flex items-center justify-center gap-2 px-5 py-2.5 text-sm font-medium transition-colors focus-visible:outline-2 focus-visible:outline-offset-2';

    $styles = match (true) {
        $variant === 'primary' && ! $dark => 'bg-accent text-paper hover:bg-ink focus-visible:outline-accent',
        $variant === 'primary' && $dark => 'bg-accent-2 text-ink hover:bg-paper focus-visible:outline-accent-2',
        $variant === 'secondary' && ! $dark => 'border border-ink text-ink hover:bg-ink hover:text-paper focus-visible:outline-accent',
        default => 'border border-paper text-paper hover:bg-paper hover:text-ink focus-visible:outline-accent-2',
    };
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$base $styles"]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => "$base $styles"]) }}>
        {{ $slot }}
    </button>
@endif
