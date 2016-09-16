<?php

namespace Vestibulum\Listeners;

use Vestibulum\Events\TClassEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Vestibulum\Helpers\Vestibulum\Standard\PSR1\TClass;

class TClassListener
{
    public function handle(TClassEvent $event)
    {
        $standard = new TClass($event->currentLine, $event->sourceLines, $event->position);
        return $standard->process();
    }
}
