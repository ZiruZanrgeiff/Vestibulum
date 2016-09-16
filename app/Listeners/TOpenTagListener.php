<?php

namespace Vestibulum\Listeners;

use Vestibulum\Events\TOpenTagEvent;
use Vestibulum\Helpers\Vestibulum\Standard\PSR2\OpenTag;

class TOpenTagListener
{
    public function handle(TOpenTagEvent $event)
    {
        $standard = new OpenTag($event->currentLine, $event->sourceLines, $event->position);
        return $standard->process();
    }
}
