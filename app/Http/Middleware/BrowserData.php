<?php

namespace App\Http\Middleware;

use App\Models\Stats;
use Closure;
use Browser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrowserData
{
    public function handle(Request $request, Closure $next): Response
    {
        $browser = Browser::browserFamily();
        $device = Browser::deviceFamily();
        Stats::create([
            'browser' => $browser,
            'device' => $device,
        ]);
//        \Log::info([$device . " connected"]);
        return $next($request);
    }
}
