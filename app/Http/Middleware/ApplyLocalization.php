<?php

namespace App\Http\Middleware;

use Closure;

class ApplyLocalization
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
        if (!$request->session()->has('locale')) {
            $request->session()->put('locale', env('DEFAULT_LANGUAGE', 'en'));
        }
        app()->setLocale($request->session()->get('locale', env('DEFAULT_LANGUAGE', 'en')));
        return $next($request);
    }
}
