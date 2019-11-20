<?php

namespace App\Http\Middleware;

use Closure;

class ForceHttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && strpos(env('APP_URL'), 'herokuapp') !== false) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
