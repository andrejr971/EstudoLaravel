<?php

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

use App\models\Cliente;
use App\models\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();

    foreach ($clientes as $cliente) {
        echo '<p> Id: ' . $cliente->id . '</p>';
        echo '<p> Nome: ' . $cliente->nome . '</p>';
        echo '<p> Telefone: ' . $cliente->telefone . '</p>';

        echo '<p> Id Cliente: ' . $cliente->endereco->cliente_id . '</p>';
        echo '<p> Rua: ' . $cliente->endereco->rua . '</p>';
        echo '<p> Numero: ' . $cliente->endereco->numero . '</p>';
        echo '<p> Cidade: ' . $cliente->endereco->cidade . '</p>';
        echo '<p> Uf: ' . $cliente->endereco->uf . '</p>';
        echo '<p> CEP: ' . $cliente->endereco->cpf . '</p>';

        
        echo '<hr>';
    }
});

Route::get('/enderecos', function () {
    $ends = Endereco::all();

    foreach ($ends as $end) {
        echo '<p> Id: ' . $end->cliente->id . '</p>';
        echo '<p> Nome: ' . $end->cliente->nome . '</p>';
        echo '<p> Telefone: ' .$end->cliente->telefone . '</p>';

        echo '<p> Id Cliente: ' . $end->id . '</p>';
        echo '<p> Rua: ' . $end->rua . '</p>';
        echo '<p> Numero: ' . $end->numero . '</p>';
        echo '<p> Cidade: ' . $end->cidade . '</p>';
        echo '<p> Uf: ' . $end->uf . '</p>';
        echo '<p> CEP: ' . $end->cpf . '</p>';

       echo '<hr>';
    }
});

Route::get('/inserir', function() {
    $c = new Cliente();
    $c->nome = 'tetse';
    $c->telefone = '4159-7074';
    $c->save();

    $e = new Endereco();
    $e->rua = 'Rua Tets';
    $e->numero = 80;
    $e->cidade = 'SR';
    $e->bairro = 'Centro';
    $e->uf = 'SP';
    $e->cpf = '06730-000';

    $c->endereco()->save($e);

    $c = new Cliente();
    $c->nome = 'Marcos';
    $c->telefone = '4159-7074';
    $c->save();

    $e = new Endereco();
    $e->rua = 'Rua Marcos';
    $e->numero = 80;
    $e->cidade = 'SR';
    $e->bairro = 'sei al';
    $e->uf = 'SP';
    $e->cpf = '06730-000';

    $c->endereco()->save($e);
});

Route::get('/clientes/json', function() {
    //$clientes = Cliente::all();

    $clientes = Cliente::with(['endereco'])->get();

    return $clientes->toJson();
});

Route::get('/enderecos/json', function() {
    //$clientes = Cliente::all();

    $end = Endereco::with(['cliente'])->get();

    return $end->toJson();
});


