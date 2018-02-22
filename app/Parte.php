<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
  /**
  * Obtiene el presupuesto
  */
  public function presupuesto(){
    return $this->belongsTo('App\Presupuesto');
  }

  /**
  * Obtiene los Materiales
  */
  public function materiales(){
    return $this->belongsToMany('App\Material');
  }
}
