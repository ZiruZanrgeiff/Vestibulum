<?php

namespace Vestibulum\Helpers;

use Doctrine\Common\Lexer\AbstractLexer;

class Lexer extends AbstractLexer
{

    public function lscan(array $source) {
        $lines = array();

        foreach($source as $number => $line) {
            $tokens = array();
            $this->setInput($line);

            while($this->moveNext()){
                if($this->lookahead['type'] !== 'Undefined'){
                    $tokens[] = $this->lookahead;
                }
            }

            $lines[] = $tokens;
        }

        return $lines;
    }

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

        $varType = '/^(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/';

        if(preg_match($varType, $value)){
            return token_name($types['var']);
        }

        if(key_exists($value, $types)) {
            $type = $types[$value];

            return is_numeric($type) ? token_name($type) : $type;
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
}