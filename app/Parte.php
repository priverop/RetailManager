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
    return $this->belongsToMany('App\Material', 'material_parte');
  }

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'nombre', 'presupuesto_id'

    ];
}
