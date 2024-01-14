<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class ShopAppInstalledEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Log::info('From ShopAuthenticatedEventListener');

        $userId = $event->shopId->toNative();
        $shop = User::find($userId);
        $response = $shop->api()->rest('GET', '/admin/shop.json');

        if ($response && $response['status'] === 200) {
            $shop->shopify_shop_id = $response['body']['shop']['id'];
            $shop->save();
        }
    }
}
