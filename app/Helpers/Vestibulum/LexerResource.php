<?php
/**
 * Created by PhpStorm.
 * User: ziru
 * Date: 16/09/16
 * Time: 13:04
 */

namespace Vestibulum\Helpers\Vestibulum;


class LexerResource
{

    private $resoureTokens = array();

    private $currentLine = 0;

    /**
     * Array of scanned tokens.
     *
     * Each token is an associative array containing three items:
     *  - 'value'    : the string value of the token in the input string
     *  - 'type'     : the type of the token (identifier, numeric, string, input
     *                 parameter, none)
     *  - 'position' : the position of the token in the input string
     *
     * @var array
     */
    private $tokens = array();

    /**
     * Current lexer position in input string.
     *
     * @var integer
     */
    private $position = 0;

    /**
     * Current peek of current lexer position.
     *
     * @var integer
     */
    private $peek = 0;

    /**
     * The next token in the input.
     *
     * @var array
     */
    public $lookahead;

    /**
     * The last matched/seen token.
     *
     * @var array
     */
    public $token;

    public function __construct( array $resource )
    {
        $this->resoureTokens = $resource;
    }

    public function setCurrentLine( $line = 0 )
    {
        $this->currentLine = $line;
        $this->tokens = $this->resoureTokens[$line];
    }

    public function getCurrentLine()
    {
        return $this->currentLine + 1;
    }

    public function getTokenByPosition( $position )
    {
        while ($this->nextToken()){
            if ($this->lookahead['position'] === $position){
                return $this->lookahead;
            };
        }

        return $this->lookahead;
    }

    /**
     * Resets the lexer.
     *
     * @return void
     */
    public function reset()
    {
        $this->lookahead = null;
        $this->token = null;
        $this->peek = 0;
        $this->position = 0;
    }

    /**
     * Resets the peek pointer to 0.
     *
     * @return void
     */
    public function resetPeek()
    {
        $this->peek = 0;
    }

    /**
     * Resets the lexer position on the input to the given position.
     *
     * @param integer $position Position to place the lexical scanner.
     *
     * @return void
     */
    public function resetPosition($position = 0)
    {
        $this->position = $position;
    }

    /**
     * Checks whether a given token matches the current lookahead.
     *
     * @param integer|string $token
     *
     * @return boolean
     */
    public function isNextToken($token)
    {
        return null !== $this->lookahead && $this->lookahead['type'] === $token;
    }

    /**
     * Checks whether any of the given tokens matches the current lookahead.
     *
     * @param array $tokens
     *
     * @return boolean
     */
    public function isNextTokenAny(array $tokens)
    {
        return null !== $this->lookahead && in_array($this->lookahead['type'], $tokens, true);
    }

    /**
     * Moves to the next token in the input string.
     *
     * @return boolean
     */
    public function nextToken()
    {
        $this->peek = 0;
        $this->token = $this->lookahead;
        $this->lookahead = (isset($this->tokens[$this->position]))
            ? $this->tokens[$this->position++] : null;

        return $this->lookahead !== null;
    }

    public function nextResource()
    {
        $this->tokens = (isset($this->resoureTokens[++$this->currentLine]))
            ? $this->resoureTokens[$this->currentLine] : null;

        return $this->tokens !== null;
    }

    public function prevResource()
    {
        $this->tokens = (isset($this->resoureTokens[--$this->currentLine]))
            ? $this->resoureTokens[$this->currentLine] : null;
        return $this->tokens !== null;
    }

    public function isWitheLine()
    {
        return (count($this->tokens) > 0) ? false: true;
    }

    /**
     * Tells the lexer to skip input tokens until it sees a token with the given value.
     *
     * @param string $type The token type to skip until.
     *
     * @return void
     */
    public function skipUntil($type)
    {
        while ($this->lookahead !== null && $this->lookahead['type'] !== $type) {
            $this->nextToken();
        }
    }

    /**
     * Moves the lookahead token forward.
     *
     * @return array|null The next token or NULL if there are no more tokens ahead.
     */
    public function peek()
    {
        if (isset($this->tokens[$this->position + $this->peek])) {
            return $this->tokens[$this->position + $this->peek++];
        } else {
            return null;
        }
    }

    /**
     * Peeks at the next token, returns it and immediately resets the peek.
     *
     * @return array|null The next token or NULL if there are no more tokens ahead.
     */
    public function glimpse()
    {
        $peek = $this->peek();
        $this->peek = 0;
        return $peek;
    }

    public function getTokens()
    {
        return $this->tokens;
    }

}