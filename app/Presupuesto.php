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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'obra_id', 'fecha', 'concepto', 'caracteristicas', 'unidades', 'estado', 'beneficio', 'precio_final',
        't_seccionadora', 'o_seccionadora', 't_escuadradora', 'o_escuadradora', 't_canteadora', 'o_canteadora',
        't_punto', 'o_punto', 't_prensa', 'o_prensa', 'desplazamiento_unidad', 'desplazamiento_beneficio',
        'transporte_unidad', 'transporte_beneficio', 'imprevistos_unidad', 'imprevistos_beneficio',
        'maquinas_operarios', 'maquinas_horas_operario', 'maquinas_operacion', 'maquinas_precio_unidad', 'maquinas_beneficio',
        'bancos_operarios', 'bancos_horas_operario', 'bancos_operacion', 'bancos_precio_unidad', 'bancos_beneficio',
        'maquinas_oficial_1_operarios', 'maquinas_oficial_1_horas_operario', 'maquinas_oficial_1_operacion', 'maquinas_oficial_1_precio_unidad', 'maquinas_oficial_1_beneficio',
        'producto_ter_1_operarios', 'producto_ter_1_horas_operario', 'producto_ter_1_operacion', 'producto_ter_1_precio_unidad', 'producto_ter_1_beneficio',
        'productor_ter_2_operarios', 'productor_ter_2_horas_operario', 'productor_ter_2_operacion', 'productor_ter_2_precio_unidad', 'productor_ter_2_beneficio',
        'oficial_1_operarios', 'oficial_1_horas_operario', 'oficial_1_operacion', 'oficial_1_precio_unidad', 'oficial_1_beneficio',
        'oficial_2_operarios', 'oficial_2_horas_operario', 'oficial_2_operacion', 'oficial_2_precio_unidad', 'oficial_2_beneficio',
        'ayudante_operarios', 'ayudante_horas_operario', 'ayudante_operacion', 'ayudante_precio_unidad', 'ayudante_beneficio'

    ];
}
