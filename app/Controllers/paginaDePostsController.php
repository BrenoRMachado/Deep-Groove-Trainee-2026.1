<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

// Controller da página de posts:
class PaginaDePostsController {
    public function index() {
        return view('site/paginaDePosts');
    }
}