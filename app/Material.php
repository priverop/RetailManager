<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
    * Obtiene el proveedor
    */
    public function proveedores(){
      return $this->belongsToMany('App\Proveedor', 'material_proveedor');
    }

    /**
    * Obtiene las Partes
    */
    public function partes(){
      return $this->belongsToMany('App\Parte', 'material_parte')->withPivot('material_id', 'proveedor_id');
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
