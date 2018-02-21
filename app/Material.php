<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
    * Obtiene el proveedor
    */
    public function proveedor(){
      return $this->belongsTo('App\Proveedor');
    }
}
