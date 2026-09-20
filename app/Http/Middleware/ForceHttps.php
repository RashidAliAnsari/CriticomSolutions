<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Forces HTTPS in production only, so local dev over http still works
 * (CLAUDE.md §13.3). Runs before session/cookie middleware so the secure
 * session cookie is never issued over a plain-http request.
 */
class ForceHttps
{
    public function handle(Request $request, Closure $next): Response
    {
        if (app()->environment('production') && ! $request->secure()) {
            return redirect()->to(
                'https://'.$request->getHttpHost().$request->getRequestUri(),
                301
            );
        }

        return $next($request);
    }
}
