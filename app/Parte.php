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
    return $this->belongsToMany('App\Material', 'material_parte')
                ->withPivot('parte_id', 'proveedor_id')
                ->join('proveedors', 'material_parte.proveedor_id', '=', 'proveedors.id')
                ->join('material_proveedor', 'material_parte.proveedor_id', '=', 'material_proveedor.proveedor_id')
                ->select('proveedors.nombre as pivot_proveedors_nombre', 'materials.*', 'material_proveedor.precio');

                //SELECT * FROM `material_parte` INNER JOIN proveedors ON material_parte.proveedor_id = proveedors.id
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
