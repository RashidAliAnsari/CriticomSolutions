<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
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

Route::get('/migrate', function (Request $request) {
    $token = (string) config('app.migration_token');
    $given = (string) $request->query('token');

    abort_unless($token !== '' && $given !== '' && hash_equals($token, $given), 404);

    Artisan::call('migrate', ['--force' => true]);

    return 'Done';
});

// robots.txt and sitemap.xml are routes, not static public/ files, so the
// disallowed admin path always matches config('filament.path') / the
// FILAMENT_PATH env var rather than drifting out of sync with it.
Route::get('/robots.txt', function () {
    $adminPath = trim((string) config('filament.path'), '/');

    $lines = [
        'User-agent: *',
        "Disallow: /{$adminPath}",
        'Sitemap: '.url('/sitemap.xml'),
    ];

    return response(implode("\n", $lines)."\n")
        ->header('Content-Type', 'text/plain');
})->name('robots');

Route::get('/sitemap.xml', function () {
    // Public pages only (CLAUDE.md §12) — the admin panel is never listed.
    $urls = collect([
        ['loc' => route('home'), 'priority' => '1.0'],
        ['loc' => route('services'), 'priority' => '0.8'],
        ['loc' => route('founder'), 'priority' => '0.7'],
        ['loc' => route('credentials'), 'priority' => '0.6'],
        ['loc' => route('contact'), 'priority' => '0.7'],
        ['loc' => route('privacy'), 'priority' => '0.3'],
    ])->concat(
        collect(config('site_sectors'))->map(fn (array $sector) => [
            'loc' => route('sectors.show', $sector['slug']),
            'priority' => '0.7',
        ])
    );

    $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

    foreach ($urls as $url) {
        $xml .= '  <url>'."\n";
        $xml .= '    <loc>'.e($url['loc']).'</loc>'."\n";
        $xml .= '    <priority>'.$url['priority'].'</priority>'."\n";
        $xml .= '  </url>'."\n";
    }

    $xml .= '</urlset>'."\n";

    return response($xml)->header('Content-Type', 'text/xml');
})->name('sitemap');
