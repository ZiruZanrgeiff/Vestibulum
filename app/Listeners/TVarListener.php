<?php

namespace Vestibulum\Listeners;

use Vestibulum\Events\TVarEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TVarListener
{
    public function handle(TVarEvent $event)
    {
        $currentLine = $event->currentLine + 1;
        return "TVarEvent called in line: {$currentLine}";
    }
}
