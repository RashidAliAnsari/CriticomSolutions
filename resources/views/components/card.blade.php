@props([
    'href' => null,
    'dark' => false,
])

@php
    $base = 'block p-6';

    $styles = $dark
        ? 'border border-white/10 bg-deep text-paper'
        : 'border border-line bg-paper text-body';

    $hover = $href
        ? ($dark ? 'transition-colors hover:border-accent-2' : 'transition-colors hover:border-accent')
        : '';

    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} @if($href) href="{{ $href }}" @endif {{ $attributes->merge(['class' => "$base $styles $hover"]) }}>
    {{ $slot }}
</{{ $tag }}>
