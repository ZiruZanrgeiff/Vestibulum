<?php

$labelRegex = '[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*';
$binNumberRegex = '0b[01]+';
$hexNumberRegex = '0x[0-9a-f]+';
$decNumberRegex = '0|[1-9][0-9]*';
$octNumberRegex = '0[0-9]+'; // 0-9 is intentional
$scriptOpenTagRegexPart = 'script[ \n\r\t]+language[ \n\r\t]*=[ \n\r\t]*(?:php|"php"|\'php\')[ \n\r\t]*>';

return [
//    'PHP_PARSER_TOKENS' => [
//
//        '/^(<\?php)/'    => T_OPEN_TAG,
//        '/^([ \n\r\t])/' => T_WHITESPACE,
//        '/^(\$' . $labelRegex . ')/' => T_VARIABLE,
//        '/^([A-Za-z0-9\\\]+$)/' => 'T_URL_NAMESPACE',
//        '/^(namespace)/' => T_NAMESPACE,
//
//    ],

    'PHP_PARSER_REGEX_TOKENS' => [

        T_OPEN_TAG   => '<\?php',
        T_WHITESPACE => '[ \n\r\t]',
        T_VARIABLE   => '\$' . $labelRegex,

        // keywords
        T_NAMESPACE  => 'namespace\b',
        T_USE        => 'use\b',
        T_CLASS_C        => '__class__\b',





    ],

    'PHP_PARSER_TYPE_TOKENS' => [
        '<?php'     => T_OPEN_TAG,
        ' '         => T_WHITESPACE,
        'namespace' => T_NAMESPACE,
        'var'       => T_VARIABLE,
        'use'       => T_USE,
        '__class__' => T_CLASS_C,

    ]
]

//    'PHP_PARSER_TOKENS' => [

//
//        // keywords
//        '__dir__\b'         => T_DIR,
//        '__file__\b'        => T_FILE,
//        '__function__\b'    => T_FUNC_C,
//        '__halt_compiler\b' => T_HALT_COMPILER,
//        '__line__\b'        => T_LINE,
//        '__method__\b'      => T_METHOD_C,
//        '__namespace__\b'   => T_NS_C,
//        '__trait__\b'       => T_TRAIT_C,
//        'abstract\b'        => T_ABSTRACT,
//        'and\b'             => T_LOGICAL_AND,
//        'array\b'           => T_ARRAY,
//        'as\b'              => T_AS,
//        'break\b'           => T_BREAK,
//        'callable\b'        => T_CALLABLE,
//        'case\b'            => T_CASE,
//        'catch\b'           => T_CATCH,
//        'class\b'           => T_CLASS,
//        'clone\b'           => T_CLONE,
//        'const\b'           => T_CONST,
//        'continue\b'        => T_CONTINUE,
//        'declare\b'         => T_DECLARE,
//        'default\b'         => T_DEFAULT,
//        'die\b'             => T_EXIT,
//        'do\b'              => T_DO,
//        'echo\b'            => T_ECHO,
//        'else\b'            => T_ELSE,
//        'elseif\b'          => T_ELSEIF,
//        'empty\b'           => T_EMPTY,
//        'enddeclare\b'      => T_ENDDECLARE,
//        'endfor\b'          => T_ENDFOR,
//        'endforeach\b'      => T_ENDFOREACH,
//        'endif\b'           => T_ENDIF,
//        'endswitch\b'       => T_ENDSWITCH,
//        'endwhile\b'        => T_ENDWHILE,
//        'eval\b'            => T_EVAL,
//        'exit\b'            => T_EXIT,
//        'extends\b'         => T_EXTENDS,
//        'final\b'           => T_FINAL,
//        'for\b'             => T_FOR,
//        'foreach\b'         => T_FOREACH,
//        'function\b'        => T_FUNCTION,
//        'global\b'          => T_GLOBAL,
//        'goto\b'            => T_GOTO,
//        'if\b'              => T_IF,
//        'implements\b'      => T_IMPLEMENTS,
//        'include\b'         => T_INCLUDE,
//        'include_once\b'    => T_INCLUDE_ONCE,
//        'instanceof\b'      => T_INSTANCEOF,
//        'insteadof\b'       => T_INSTEADOF,
//        'interface\b'       => T_INTERFACE,
//        'isset\b'           => T_ISSET,
//        'list\b'            => T_LIST,
//        'new\b'             => T_NEW,
//        'or\b'              => T_LOGICAL_OR,
//        'print\b'           => T_PRINT,
//        'private\b'         => T_PRIVATE,
//        'protected\b'       => T_PROTECTED,
//        'public\b'          => T_PUBLIC,
//        'require\b'         => T_REQUIRE,
//        'require_once\b'    => T_REQUIRE_ONCE,
//        'return\b'          => T_RETURN,
//        'static\b'          => T_STATIC,
//        'switch\b'          => T_SWITCH,
//        'throw\b'           => T_THROW,
//        'trait\b'           => T_TRAIT,
//        'try\b'             => T_TRY,
//        'unset\b'           => T_UNSET,
//        'var\b'             => T_VAR,
//        'while\b'           => T_WHILE,
//        'xor\b'             => T_LOGICAL_XOR,
//        // casts
//        '\([ \t]*array[ \t]*\)'                 => T_ARRAY_CAST,
//        '\([ \t]*bool(?:ean)?[ \t]*\)'          => T_BOOL_CAST,
//        '\([ \t]*(?:real|double|float)[ \t]*\)' => T_DOUBLE_CAST,
//        '\([ \t]*int(?:eger)?[ \t]*\)'           => T_INT_CAST,
//        '\([ \t]*object[ \t]*\)'                => T_OBJECT_CAST,
//        '\([ \t]*(?:string|binary)[ \t]*\)'     => T_STRING_CAST,
//        '\([ \t]*unset[ \t]*\)'                 => T_UNSET_CAST,
//        // comparison operators
//        '===' => T_IS_IDENTICAL,
//        '!==' => T_IS_NOT_IDENTICAL,
//        '=='  => T_IS_EQUAL,
//        '!='  => T_IS_NOT_EQUAL,
//        '<>'  => T_IS_NOT_EQUAL,
//        '>='  => T_IS_GREATER_OR_EQUAL,
//        '<='  => T_IS_SMALLER_OR_EQUAL,
//        // combined assignment operators
//        '\+=' => T_PLUS_EQUAL,
//        '-='  => T_MINUS_EQUAL,
//        '\*=' => T_MUL_EQUAL,
//        '/='  => T_DIV_EQUAL,
//        '%='  => T_MOD_EQUAL,
//        '\.='  => T_CONCAT_EQUAL,
//        '&='  => T_AND_EQUAL,
//        '\|=' => T_OR_EQUAL,
//        '\^=' => T_XOR_EQUAL,
//        '<<=' => T_SL_EQUAL,
//        '>>=' => T_SR_EQUAL,
//        // other operators
//        '=>'   => T_DOUBLE_ARROW,
//        '\\\\' => T_NS_SEPARATOR,
//        '::'   => T_PAAMAYIM_NEKUDOTAYIM,
//        '\|\|' => T_BOOLEAN_OR,
//        '&&'   => T_BOOLEAN_AND,
//        '<<'   => T_SL,
//        '>>'   => T_SR,
//        '--'   => T_DEC,
//        '\+\+' => T_INC,
//
//        // number literals (order of rules is important)
//        '(?:[0-9]+\.[0-9]*|\.[0-9]+)(?:e[+-]?[0-9]+)?' => T_DNUMBER,
//        '[0-9]+e[+-]?[0-9]+' => T_DNUMBER,
//
//        // comments
//        '(?:#|//)[^\r\n?]*(?:\?(?!>)[^\r\n?]*)*(?:\r\n|\n|\r|(?=\?>)|$)' => T_COMMENT,
//
//        // strings
//        'b?\'[^\'\\\\]*(?:\\\\.[^\'\\\\]*)*\'' => T_CONSTANT_ENCAPSED_STRING,
//        'b?\'[^\'\\\\]*(?:\\\\.[^\'\\\\]*)*$' => T_ENCAPSED_AND_WHITESPACE, // unterminated string literal
//        'b?"[^"\\\\${]*(?:(?:\\\\.|\$(?!\{|' . $labelRegex . ')|\{(?!\$))[^"\\\\${]*)*"' => T_CONSTANT_ENCAPSED_STRING,
//
//        $labelRegex => T_STRING,
//        '[^"\\\\${]*(?:(?:\\\\.|\$(?!\{|' . $labelRegex . ')|\{(?!\$))[^"\\\\${]*)*' => T_ENCAPSED_AND_WHITESPACE,
//