<?php

namespace Vestibulum\Helpers\Vestibulum\Standard\PSR2;

use Vestibulum\Helpers\Vestibulum\Standard\AbstractStandard;

class Variable extends AbstractStandard
{

    public function process()
    {
        while ($this->nextToken()) {
            $this->skipUntil('T_VAR');

            $value = $this->lookahead['value'];

            $line = $this->currentLine +1;

            if (preg_match('/\$[A-Z][a-z]+/', $value)) {
                $this->errors[] =
                    "Line: {$line}; Position: {$this->lookahead['position']}; The variables should not begin with uppercase letter.";

            }
        }

        return $this->errors;
    }
}