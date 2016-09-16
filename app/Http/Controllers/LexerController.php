<?php

namespace Vestibulum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Vestibulum\Helpers\Vestibulum\VestibulumManager;

class LexerController extends Controller
{
    public function index()
    {

        $file = file(storage_path('app/public/arquivo.php'));

        $manager = new VestibulumManager();

        $manager->scan($file);

        $manager->dispacthEvents();
        return ($manager->dispacthEvents());

    }
}