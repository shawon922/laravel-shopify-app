<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;


class PreventDuplicateTransaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cacheKey = 'user:'. $request->user()->id;
        $cacheVal = 'payment:'. $request->get('receiver_id') .':'. $request->get('amount');

        if (Cache::get($cacheKey) === $cacheVal) {
            Log::error('Duplicate payment');
            die;
            // return back()->with('error', 'Error! Duplicate payment.')->withInput();
        }

        $response = $next($request);

        Cache::put($cacheKey, $cacheVal, 60);

        Log::info('New Amount: '. Cache::get($request->user()->id .':amount'));

        return $response;
    }
}
