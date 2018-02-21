<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
  /**
  * Obtiene el cliente
  */
  public function cliente(){
    return $this->belongsTo('App\Cliente');
  }
}
