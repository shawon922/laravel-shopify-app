<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class RequestModifier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() 
            && Str::contains(auth()->user()->name, 'myshopify.com') 
            && !isset($request->host)) {
            
            $storeName = explode('.', auth()->user()->name)[0];
            // $host = 'admin.shopify.com/store/'.$storeName;
            $host = 'admin.shopify.com';

            $request->merge([
                'host' => base64_encode($host)
            ]);
        }

        return $next($request);
    }
}
