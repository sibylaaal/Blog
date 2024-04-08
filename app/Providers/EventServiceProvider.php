<?php

namespace App\Providers;

use App\Events\Fireevent;
use App\Listeners\FireListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected  $listen=[
        Fireevent::class=>[
            FireListener::class
        ]
    ]
;


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
