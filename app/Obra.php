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
  * Obtiene sus Presupuestoss
  */
  public function presupuestos(){
    return $this->hasMany('App\Presupuesto');
  }

  /**
  * Guardamos la fecha en formato SQL
  */
  public function setFechaAttribute($value) {
    $this->attributes['fecha'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
  }

  /**
  * Devuelve la fecha en formato español
  */
  public function getFechaAttribute($value) {
    return \Carbon\Carbon::parse($value)->format('d-m-Y');
  }

  protected $fillable = [

      'nombre', 'fecha', 'cliente_id', 'beneficio', 'porcentaje_montaje', 'coste_montaje', 'porcentaje_transporte', 'coste_transporte', 'margen_estructural', 'margen_comercial'

  ];

}
