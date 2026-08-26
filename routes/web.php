<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/sectors/{slug}', function (string $slug) {
    $sector = collect(config('site_sectors'))->firstWhere('slug', $slug);

    abort_unless($sector, 404);

    return view('sectors.show', compact('sector'));
})->name('sectors.show');

Route::get('/founder', function () {
    return view('founder');
})->name('founder');
