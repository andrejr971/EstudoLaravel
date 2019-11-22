<?php

use App\Categoria;
use App\Produto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cat', function () {
    $cat = Categoria::all();

    if(count($cat) === 0) {
        echo '<h4>Não tem Categoria</h4>';
    } else {
        foreach ($cat as $c) {
            echo '<p> Id: ' . $c->id . '</p>';
            echo '<p> Nome: ' . $c->nome . '</p>';
        }
    }
});

Route::get('/prod', function () {
    $prods = Produto::all();

    if(count($prods) === 0) {
        echo '<h4>Não tem Categoria</h4>';
    } else {

        echo '<table>';
            echo '<thead><tr><th>Nome</th><th>Estoque</th><th>preco</th><th>Categoria</th></tr></thead>';
            echo '<tbody>';
                foreach ($prods as $prod) {
                    echo '<tr>';
                        echo '<td>' . $prod->nome . '</td>';
                        echo '<td>' . $prod->estoque . '</td>';
                        echo '<td>' . $prod->preco . '</td>';
                        echo '<td>' . $prod->categoria->nome . '</td>';
                    echo '</tr>';
                }
            echo '</tbody>';
        echo '</table>';
    }
});

Route::get('/categoriaTodos', function () {
    $cat = Categoria::all();

    if(count($cat) === 0) {
        echo '<h4>Não tem Categoria</h4>';
    } else {
        foreach ($cat as $c) {
            echo '<p>' . $c->id .' :' . $c->nome . '</p>';

            $produtos = $c->produtos;

            if(count($produtos) > 0) {
                echo '<ul>';
                    foreach ($produtos as $p) {
                        echo '<li>' . $p->nome . '</li>';
                    }
                echo '</ul>';
            }
        }
    }
});

Route::get('/categoriaTodos/json', function () {
    $cat = Categoria::with('produtos')->get();

    return $cat->toJson();
});


Route::get('/addProd', function () {
    $cat = Categoria::find(1);

    $p = new Produto();

    $p->nome = 'meu novo';
    $p->estoque = 50;
    $p->preco = 100;
    $p->categoria()->associate($cat);

    $p->save();

    return $p->toJson();
});

Route::get('/des', function () {
    $p = Produto::find(10);

    if(isset($p)) {
        $p->categoria()->dissociate();
        $p->save();

        return $p->toJson();
    }

    return '';
});

Route::get('/addProd/{cat}', function ($catid) {
    $cat = Categoria::with('produtos')->find($catid);

    $p = new Produto();

    $p->nome = 'meu novo ADD 2';
    $p->estoque = 50;
    $p->preco = 100;

    if(isset($cat)) {
        $cat->produtos()->save($p);
    }

    //recarrega categorias
    $cat->load('produtos');
    return $cat->toJson();
});
