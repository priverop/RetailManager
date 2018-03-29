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

  /**
  * Devuelve la fecha en formato español
  */

  public function getFechaAttribute($value) {
    return \Carbon\Carbon::parse($value)->format('d-m-Y');
  }

}
