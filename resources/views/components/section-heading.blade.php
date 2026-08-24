@props([
    'eyebrow' => null,
    'level' => 2,
    'dark' => false,
    'align' => 'left',
])

@php
    $tag = 'h' . $level;

    $size = match (true) {
        $level <= 1 => 'text-3xl sm:text-4xl',
        $level === 2 => 'text-2xl sm:text-3xl',
        default => 'text-xl sm:text-2xl',
    };

    $headingColor = $dark ? 'text-paper' : 'text-ink';
    $alignClass = $align === 'center' ? 'text-center' : 'text-left';
@endphp

<div {{ $attributes->merge(['class' => $alignClass]) }}>
    @if ($eyebrow)
        <x-mono-label :dark="$dark" class="mb-3 block">{{ $eyebrow }}</x-mono-label>
    @endif

    <{{ $tag }} class="{{ $size }} font-semibold tracking-tight {{ $headingColor }}">
        {{ $slot }}
    </{{ $tag }}>
</div>
