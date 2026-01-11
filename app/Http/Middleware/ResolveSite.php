<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ResolveSite
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost(); // npr: milos.kvota.test | kvota.test | milos.codegalerija.rs
        $parts = explode('.', $host);

        // Ako ima subdomen → uzmi ga, u suprotnom default = milos
        $site = count($parts) > 2 ? $parts[0] : 'milos';

        // Dozvoljeni sajtovi
        if (!in_array($site, ['milos', 'teretana'], true)) {
            // fallback na milos (ili može abort(404) ako želiš strogo)
            $site = 'milos';
        }

        // ⭐ KLJUČNO: globalni default za rute
        URL::defaults(['site' => $site]);

        return $next($request);
    }
}
