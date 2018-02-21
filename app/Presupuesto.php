<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
  /**
  * Obtiene la obra
  */
  public function obra(){
    return $this->belongsTo('App\Obra');
  }
}
