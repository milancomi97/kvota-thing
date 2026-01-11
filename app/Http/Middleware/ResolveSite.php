<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ResolveSite
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();       // milos.codegalerija.rs
        $site = explode('.', $host)[0];    // milos

        // Dozvoli samo ova dva (za sada)
        if (!in_array($site, ['milos', 'teretana'], true)) {
            abort(404);
        }

        // Globalno dostupno u app('site')
        app()->instance('site', $site);

        return $next($request);
    }
}
