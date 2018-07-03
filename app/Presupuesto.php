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

  /**
  * Obtiene sus Planos
  */
  public function planos(){
    return $this->hasMany('App\Plano');
  }

  /**
  * Obtiene sus Planos
  */
  public function material_externos(){
    return $this->hasMany('App\MaterialExterno');
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
    return \Carbon\Carbon::parse($value)->format('d/m/Y');
  }


  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $guarded = [
       'id'
     ];
}
