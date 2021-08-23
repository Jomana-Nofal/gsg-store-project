<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->query('lang',session('lang'));
        if ($lang) {
            App::setLocale($lang);
            session()->put('lang', $lang);
        }

       
        return $next($request);
    }
}
