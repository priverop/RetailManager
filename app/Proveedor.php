<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
  /**
  * Obtiene los Materiales
  */
  public function materiales(){
    return $this->belongsToMany('App\Material', 'material_proveedor');
  }
}
