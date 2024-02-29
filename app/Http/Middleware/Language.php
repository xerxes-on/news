<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('lang')){
            $lang = session('lang');
        }else{
            session(['lang' =>'en']);
        }
//        \App::setLocale($lang);
        return $next($request);
    }
}
