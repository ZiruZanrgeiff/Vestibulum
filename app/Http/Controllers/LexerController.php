<?php

namespace Vestibulum\Http\Controllers;

use Illuminate\Http\Request;

use Vestibulum\Helpers\Vestibulum\VestibulumManager;

class LexerController extends Controller
{
    public function index()
    {

        $file = file(__FILE__);


        $manager = new VestibulumManager();

        $manager->scan($file);

        dd([$manager->executionMessages,$manager->dispacthEvents()]);

    }
}