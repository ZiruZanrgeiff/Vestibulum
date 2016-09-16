<?php

namespace Vestibulum\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Vestibulum\Events\TVarEvent;
use Illuminate\Queue\InteractsWithQueue;
use Vestibulum\Helpers\Vestibulum\Standard\PSR2\Variable;

class TVarListener
{
    public function handle(TVarEvent $event)
    {
        $standard = new Variable($event->currentLine, $event->sourceLines, $event->position);
        return $standard->process();
    }
}
