<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

// !composer dump-autoload reconstrói as rotas

class dashboardController {
    public function index() {
        return view('admin/dashboard');
    }
}