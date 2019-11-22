<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    function cliente() {
        return $this->belongsTo('App\models\Cliente', 'cliente_id', 'id');
    }
}
