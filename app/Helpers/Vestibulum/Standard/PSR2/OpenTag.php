<?php

namespace Vestibulum\Helpers\Vestibulum\Standard\PSR2;


use Vestibulum\Helpers\Vestibulum\Standard\AbstractStandard;

class OpenTag extends AbstractStandard
{

    public function process()
    {
        $lexer = $this->lexerResource;

        if($lexer->getCurrentLine() > 1 || $this->position > 0){
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'The opening tag MUST be the first file of the element.'
                );
        }

        $lexer->nextResource();

        if(!$lexer->isWitheLine()){
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'There MUST be a empty line after the opening tag.'
                );
        }

        return $this->errors;
    }
}