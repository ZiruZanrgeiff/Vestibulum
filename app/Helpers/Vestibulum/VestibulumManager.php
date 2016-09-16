<?php
/**
 * Created by PhpStorm.
 * User: ziru
 * Date: 16/09/16
 * Time: 03:58
 */

namespace Vestibulum\Helpers\Vestibulum;


class VestibulumManager
{

    private $sourceLines = array();

    private $lexer;

    private $startTime = 0;

    private $endTime = 0;

    public $executionMessages = array();

    public function __construct()
    {
        $this->lexer = new Lexer();
    }

    public function scan(array $source) {

        $this->startExec();

        $lines = array();

        foreach($source as $number => $line) {
            $tokens = array();
            $this->lexer->setInput($line);

            while($this->lexer->moveNext()){
                $tokenType = $this->lexer->lookahead['type'];

                if($tokenType !== 'Undefined'){
                    $tokens[] = $this->lexer->lookahead;
                }
            }

            $lines[] = $tokens;
        }

        $this->sourceLines = $lines;

        $this->executionMessages[] = "Tokenize file time: " . $this->elapsedExec();
    }

    public function dispacthEvents()
    {
        $events = config('global.PHP_PARSER_EVENTS_TOKENS');

        $eventResponses = array();

        foreach ($this->sourceLines as $key => $line)

            foreach ($line as $tokens) {

                if (key_exists($tokens['type'], $events)) {

                    $ress = \Event::fire(new $events[$tokens['type']]($key, $this->sourceLines));

                    $eventResponses[] = $ress;
                }
            }


        return $eventResponses;
    }

    private function startExec()
    {
        $this->startTime =  microtime(true);
    }

    private function elapsedExec()
    {
        $this->endTime =  microtime(true) - $this->startTime;
        return $this->endTime;
    }
}