<?php

namespace App\Http\Controllers;

use Illuminate\Support\Sleep;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PaymentController extends Controller
{
    
    public function create()
    {
        // Cache::put(auth()->user()->id .':amount', 5000);

        return Inertia::render('Payment/Create');
    }

    public function store(Request $request)
    {
        $amount = Cache::get(auth()->user()->id .':amount');
        Log::info('Old Amount: '. $amount);

        Sleep::for(5)->seconds();  // Sleep for 5 seconds

        Cache::put(auth()->user()->id .':amount', $amount - $request->get('amount'));
        // dd($request);
    }
}
