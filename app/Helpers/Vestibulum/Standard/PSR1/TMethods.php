<?php
/**
 * Created by PhpStorm.
 * User: ziru
 * Date: 16/09/16
 * Time: 17:45
 */

namespace Vestibulum\Helpers\Vestibulum\Standard\PSR1;


use Vestibulum\Helpers\Vestibulum\Standard\AbstractStandard;

class TMethods extends AbstractStandard
{

    public function process()
    {
        $lexer = $this->lexerResource;
        $lexer->skipUntil('T_LITERAL');

        $value = $lexer->lookahead['value'];

        if (preg_match('/^([A-Z])/', $value)) {
            $this->errors[] =
                $this->getErrorMessage(
                    $lexer->getCurrentLine(),
                    $lexer->lookahead['position'],
                    'Method names MUST be declared in camelCase().'
                );
        }

        return $this->errors;
    }
}