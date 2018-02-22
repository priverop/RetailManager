<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
  /**
  * Obtiene la Obra
  */
  public function obra(){
    return $this->belongsTo('App\Obra');
  }

  /**
  * Obtiene sus Partes
  */
  public function partes(){
    return $this->hasMany('App\Parte');
  }
}
