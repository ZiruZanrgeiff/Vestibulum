<?php

namespace Vestibulum\Listeners;

use Vestibulum\Events\TOpenTagEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TOpenTagListener
{
    public function handle(TOpenTagEvent $event)
    {
        $currentLine = $event->currentLine + 1;

        return "TOpenTagEvent called in line: {$currentLine}";
    }
}
