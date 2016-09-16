<?php

namespace Vestibulum\Http\Controllers;

use Illuminate\Http\Request;

use Vestibulum\Helpers\Vestibulum\VestibulumManager;

class LexerController extends Controller
{
    public function index()
    {
        $Tect = null;
        $file = file(__FILE__);


        $Um = null;
        $var = array(
          $Um, $Um, $Um, $Um
        );
        $manager = new VestibulumManager();

        $manager->scan($file);

        $manager->dispacthEvents();
        return dd($manager->dispacthEvents());

    }
}