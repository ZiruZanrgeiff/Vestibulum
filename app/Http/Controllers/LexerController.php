<?php

namespace Vestibulum\Http\Controllers;

use Illuminate\Http\Request;

use Vestibulum\Helpers\Lexer;

class LexerController extends Controller
{
    public function index()
    {

        $file = file(__FILE__);

        $var = "text";

        $lexer = new Lexer();

        $result = $lexer->lscan($file);


        return response()->json($result);
    }
}
