<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoControlador extends Controller
{
    public function index() {
        echo 'teste112121';

        if(Auth::check()) {
            $user = Auth::user();

            echo '<h4>Voce esta logado</h4>';
            echo '<p>' . $user->name . '</p>';
            echo '<p>' . $user->email . '</p>';
            echo '<p>' . $user->id . '</p>';
        } else {
            echo 'Delogado';
        }
    }
}
