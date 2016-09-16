<?php

namespace Vestibulum\Listeners;

use Vestibulum\Events\TConstEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Vestibulum\Helpers\Vestibulum\Standard\PSR1\TConst;

class TConstListener
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

    public function handle(TConstEvent $event)
    {
        $standard = new TConst($event->currentLine, $event->sourceLines, $event->position);
        return $standard->process();
    }
}
