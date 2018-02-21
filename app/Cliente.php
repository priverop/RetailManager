<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  /**
  * Obtiene las obras del cliente
  */
  public function obras(){
    return $this->hasMany('App\Obra');
  }
}
