<?php
/**
 * Created by PhpStorm.
 * User: ziru
 * Date: 16/09/16
 * Time: 16:52
 */

namespace Vestibulum\Helpers\Vestibulum\Standard\PSR1;


use Vestibulum\Helpers\Vestibulum\Standard\AbstractStandard;

class TClass extends AbstractStandard
{

    public function process()
    {
        $lexer = $this->lexerResource;
        $lexer->skipUntil('T_LITERAL');

        $value = $lexer->lookahead['value'];

        if (preg_match('/^([a-z])/', $value)) {
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'Class names MUST be declared in StudlyCaps.'
                );
        }

        if (preg_match('/([_]+)/', $value)) {
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'Class names SHOULD NOT have underscore.'
                );
        }

        $lexer->prevResource();

        if(!$lexer->isWitheLine()){

            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'There MUST be a empty line before declaration class.'
                );

        }

        return $this->errors;
    }
}