@props([
    'as' => 'p',
    'dark' => false,
])

@php
    $tag = $as;
    $color = $dark ? 'text-accent-2' : 'text-accent';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => "font-mono text-xs uppercase tracking-mono-label $color"]) }}>
    {{ $slot }}
</{{ $tag }}>
