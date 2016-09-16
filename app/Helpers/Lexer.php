<?php

namespace Vestibulum\Helpers;

use Doctrine\Common\Lexer\AbstractLexer;

class Lexer extends AbstractLexer
{
    /**
     * Lexical catchable patterns.
     *
     * @return array
     */
    protected function getCatchablePatterns()
    {
        return config('global.PHP_PARSER_REGEX_TOKENS');
    }

    /**
     * Retrieve token type. Also processes the token value if necessary.
     *
     * @param string $value
     *
     * @return string
     */
    protected function getType(&$value)
    {
        $types = config('global.PHP_PARSER_TYPE_TOKENS');

        $varTypeRegex = '/^(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/';
        $stringRegex  = '/^(^[\'|"][a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/';
        $literalRegex  = '/^([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/';

        if(key_exists($value, $types)) {
            $type = $types[$value];

            return  $this->getTokenName($type);
        }

        if(preg_match($stringRegex, $value)){
            return $this->getTokenName($types['string']);
        }

        if(preg_match($varTypeRegex, $value)){
            return $this->getTokenName($types['var']);
        }

        if(preg_match($literalRegex, $value)){
            return $this->getTokenName($types['literal']);
        }

        return 'Undefined';
    }

    /**
     * Lexical non-catchable patterns.
     *
     * @return array
     */
    protected function getNonCatchablePatterns()
    {
        return[];
    }

    private function getTokenName($type)
    {
        return is_numeric($type) ? token_name($type) : $type;
    }
}