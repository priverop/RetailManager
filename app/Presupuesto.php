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
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $guarded = [
       'id'
     ];
}
