<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class InstrucoesController
{
    public function index()
    {
        return view('site/instrucoes');
    }
}