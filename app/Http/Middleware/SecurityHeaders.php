<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Security headers for every response (CLAUDE.md §13.3).
 *
 * Applied globally (see bootstrap/app.php) because the Filament panel
 * registers its own middleware stack and does not pass through the
 * "web" route middleware group — see AdminPanelProvider.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Content-Security-Policy', $this->policy($request));

        // CLAUDE.md §13.3: noindex on admin responses.
        if ($this->isAdminRequest($request)) {
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        }

        return $response;
    }

    protected function isAdminRequest(Request $request): bool
    {
        $path = trim((string) config('filament.path'), '/');

        return $request->is($path) || $request->is("{$path}/*");
    }

    protected function policy(Request $request): string
    {
        if ($this->isAdminRequest($request)) {
            // Filament's CSS/JS/fonts are self-hosted (published to
            // public/css/filament, public/js/filament, public/fonts/filament)
            // and served same-origin — no third-party hosts needed. But
            // Filament bundles Alpine.js (core build, not the CSP build) for
            // its interactivity, which evaluates expressions from x-data /
            // x-on attributes at runtime, and Filament/Livewire inject
            // inline <style> for things like the active theme colour. That
            // needs 'unsafe-eval' and 'unsafe-inline' on script-src, and
            // 'unsafe-inline' on style-src — there is no Filament-supported
            // nonce-based alternative for a plain Blade/Livewire panel.
            return implode('; ', [
                "default-src 'self'",
                "script-src 'self' 'unsafe-eval' 'unsafe-inline'",
                "style-src 'self' 'unsafe-inline'",
                "font-src 'self' data:",
                "img-src 'self' data: blob:",
                "connect-src 'self'",
                "base-uri 'self'",
                "form-action 'self'",
                "frame-ancestors 'self'",
                "object-src 'none'",
            ]);
        }

        // Public site: self-hosted fonts and compiled Tailwind CSS only,
        // no third-party scripts. The homepage hero <x-path-profile />
        // component has one inline <style> block for its draw-on animation,
        // hence style-src 'unsafe-inline'; nothing else on the site uses
        // inline styles or scripts, so script-src stays 'self' only.
        return implode('; ', [
            "default-src 'self'",
            "script-src 'self'",
            "style-src 'self' 'unsafe-inline'",
            "font-src 'self'",
            "img-src 'self' data:",
            "connect-src 'self'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'none'",
            "object-src 'none'",
        ]);
    }
}
