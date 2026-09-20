@props([
    'title' => null,
    'description' => null,
    'bodyClass' => null,
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ? "{$title} — Criticom Solutions" : 'Criticom Solutions — engineering consultancy for mission-critical wireless' }}</title>
    @if ($description)
        <meta name="description" content="{{ $description }}">
    @endif

    <meta property="og:site_name" content="Criticom Solutions">
    <meta property="og:type" content="website">
    @if ($title)
        <meta property="og:title" content="{{ $title }}">
    @endif
    @if ($description)
        <meta property="og:description" content="{{ $description }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="flex min-h-screen flex-col bg-paper text-body antialiased {{ $bodyClass }}">
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:fixed focus:top-2 focus:left-2 focus:z-50 focus:bg-ink focus:px-4 focus:py-2 focus:text-paper"
    >
        Skip to content
    </a>

    <x-site-header />

    <main id="main-content" class="flex-1">
        {{ $slot }}
    </main>

    <x-site-footer />
</body>
</html>
