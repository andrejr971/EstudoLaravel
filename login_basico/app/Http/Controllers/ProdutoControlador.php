<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        echo 'Lista de produto';
    }
}
