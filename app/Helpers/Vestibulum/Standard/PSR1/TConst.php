<?php

namespace Vestibulum\Helpers\Vestibulum\Standard\PSR1;


use Vestibulum\Helpers\Vestibulum\Standard\AbstractStandard;

class TConst extends AbstractStandard
{

    public function process()
    {
        $lexer = $this->lexerResource;
        $lexer->skipUntil('T_LITERAL');

        $value = $lexer->lookahead['value'];

        if (preg_match('/[a-z]+/', $value)) {
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'Class constants MUST be declared in all upper case with underscore separators.'
                );
        }

        return $this->errors;
    }
}