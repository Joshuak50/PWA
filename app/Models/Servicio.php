<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function user()
       {
           return $this->belongsTo(User::class, 'user_id');
       }
       public function cliente() {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }
}
