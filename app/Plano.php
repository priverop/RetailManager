<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{

  /**
  * Obtiener su presupuesto
  */
  public function presupuesto(){
    return $this->belongsTo('App\Presupuesto');
  }

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'presupuesto_id', 'filename'

    ];
}
