<?php

namespace Vestibulum\Listeners;

use Vestibulum\Events\TClassEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TClassListener
{
    public function handle(TClassEvent $event)
    {
        $currentLine = $event->currentLine + 1;

        return "TClassEvent called in line: {$currentLine}";
    }
}
