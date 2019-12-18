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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function() {
    return 'acesso negado';
});

Route::post('/login', function (Request $request) {
    $loginOk = false;
    $admin = false;
    switch ($request->input('user')) {
        case 'joao':
            $loginOk = $request->input('senha') === '123';
            break;
        case 'marcos':
            $loginOk = $request->input('senha') === '12';
            break;
        default:
            $loginOk = false;
            break;
    }

    if($loginOk) {
        $login = ['user' =>$request->input('user'), 'admin' => $admin];
        $request->session()->put('Login', $login);
        return response('OK', 200);
    } else {
        $request->session()->flush();
        return response('Erro', 404);
    }
});

Route::get('/sair', function (Request $request) {
    $request->session()->flush();
    return response('Deslogado', 200);
});
