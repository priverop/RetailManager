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
                ->withPivot('id', 'parte_id', 'proveedor_id', 'unidades', 'largo', 'ancho', 'alto', 'm', 'total_m', 'm2', 'total_m2', 'm3', 'total_m3', 'descuento', 'precio_total')
                ->join('proveedors', 'material_parte.proveedor_id', '=', 'proveedors.id')
                ->join('material_proveedor', 'material_parte.material_id', '=', 'material_proveedor.material_id')
                ->select('proveedors.nombre as pivot_proveedors_nombre', 'materials.*', 'material_proveedor.precio', 'material_proveedor.unidad', 'material_proveedor.descuento',
                          'material_proveedor.min_unidades');

                //SELECT * FROM `material_parte` INNER JOIN proveedors ON material_parte.proveedor_id = proveedors.id
  }

  public function materialespartes(){
    return $this->belongsToMany('App\Material', 'material_parte')
    ->withPivot('id', 'parte_id', 'material_id', 'proveedor_id', 'unidades', 'largo', 'ancho', 'alto', 'm', 'total_m', 'm2', 'total_m2', 'm3', 'total_m3', 'descuento', 'precio_total');
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
