<?php

namespace Vestibulum\Listeners;

use Vestibulum\Events\TMethodsEvent;
use Vestibulum\Helpers\Vestibulum\Standard\PSR1\TMethods;

class TMethodsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(TMethodsEvent $event)
    {
        $standard = new TMethods($event->currentLine, $event->sourceLines, $event->position);
        return $standard->process();
    }
}
