<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    private $produtos = [
        'televisao 40',
        'notebook',
        'impressora',
        'hd externo'
    ];

    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\ProdutoAdmin::class);
    }
    public function index() {
        echo '<h3>Produtos</h3>';
        echo '<ol>';
        foreach ($this->produtos as $value) {
            echo '<li>' . $value . '</li>';
        }
        echo '</ol>';
    }
}
