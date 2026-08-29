<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/credentials', function () {
    return view('credentials');
})->name('credentials');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:3,60')
    ->name('contact.store');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/migrate', function() {
    Artisan::call('migrate', ['--force' => true]);
    return 'Done';
});
