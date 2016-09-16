<?php

namespace Vestibulum\Helpers\Vestibulum\Standard;

abstract class AbstractStandard
{
    protected $currentLine;

    protected $sourceLines;

    protected $position = 0;

    protected $lookahead;

    private $tokens = array();
    protected $errors  = array();

    public function __construct( $currentLine, array $sourceLines )
    {
        $this->currentLine = $currentLine;
        $this->sourceLines = $sourceLines;

        $this->setCurrentLine();
    }

    protected function nextToken()
    {
        $this->token = $this->lookahead;
        $this->lookahead = (isset($this->tokens[$this->position]))
            ? $this->tokens[$this->position++] : null;

        return $this->lookahead !== null;
    }

    public abstract function process();

    protected function setCurrentLine()
    {
        $this->tokens = $this->sourceLines[$this->currentLine];
    }

    protected function skipUntil($type)
    {
        while ($this->lookahead !== null && $this->lookahead['type'] !== $type) {
            $this->nextToken();
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}