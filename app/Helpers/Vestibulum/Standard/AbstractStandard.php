<?php

namespace Vestibulum\Helpers\Vestibulum\Standard;

use Vestibulum\Helpers\Vestibulum\LexerResource;

abstract class AbstractStandard
{
    protected $position = 0;

    protected $errors = array();

    protected $lexerResource = null;

    public function __construct( $currentLine, $position, array $sourceLines )
    {
        $this->currentLine = $currentLine;
        $this->position = $position;
        $this->lexerResource = new LexerResource($sourceLines);

        $this->_init();
    }

    private function _init()
    {
        $lexer = $this->lexerResource;
        $lexer->setCurrentLine($this->currentLine);
        $lexer->getTokenByPosition($this->position);
    }

    protected function getErrorMessage($line, $position, $msg)
    {
        return sprintf(
            'Line: %s; Position: %s; %s',
            $line,
            $position,
            $msg
        );
    }

    public abstract function process();

}