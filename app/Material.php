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

    /**
    * Obtiene las Partes
    */
    public function partes(){
      return $this->belongsToMany('App\Parte');
    }

    /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [

          'nombre', 'precio', 'proveedor_id'

      ];
}
