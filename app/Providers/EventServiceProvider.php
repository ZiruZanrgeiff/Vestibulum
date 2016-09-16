<?php

namespace Vestibulum\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Vestibulum\Events\TOpenTagEvent' => [
            'Vestibulum\Listeners\TOpenTagListener',
        ],

        'Vestibulum\Events\TClassEvent' => [
            'Vestibulum\Listeners\TClassListener',
        ],

        'Vestibulum\Events\TVarEvent' => [
            'Vestibulum\Listeners\TVarListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
