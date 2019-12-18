<?php

use Illuminate\Support\Facades\Route;

Route::get('/usuarios', 'UsuarioControlador@index')
        ->middleware('primeiro', 'segundo');

Route::get('/', function() {
    return 'Terceiro';
})->middleware('terceiro:andre');
