<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function endereco() {
        return $this->hasOne('App\models\Endereco', 'cliente_id', 'id');
    }
}
