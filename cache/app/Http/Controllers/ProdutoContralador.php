<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProdutoContralador extends Controller
{
    function index() {

        $ttl = 1; //min
        $produtos = Cache::remember('todos_produtos', $ttl, function () {
            info('passei por aqui');
            return Produto::with('categorias')->get();
        });

        return view('produtos', [
            'produtos' => $produtos
        ]);
    }
}
