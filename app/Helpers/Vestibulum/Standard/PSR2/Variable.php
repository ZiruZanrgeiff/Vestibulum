<?php

namespace Vestibulum\Helpers\Vestibulum\Standard\PSR2;

use Vestibulum\Helpers\Vestibulum\Standard\AbstractStandard;

class Variable extends AbstractStandard
{

    public function process()
    {
        $lexer = $this->lexerResource;
        $token = $lexer->lookahead;

        $value = $token['value'];

        if (preg_match('/\$[A-Z][a-z]+/', $value)) {
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'The variables should not begin with uppercase letter.'
                );
        }

        if(preg_match('/[_]+/', $value)){
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'The variables should not have underscore.'
                );
        }

        return $this->errors;
    }
}