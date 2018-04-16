<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Obra;

class excelController extends Controller
{
  public function ExportPRE($id){
    $i = 0;
    $obra = Obra::find($id);
    foreach($obra->presupuestos as $key => $value){
      $Tipo_de_Documento = $obra->id;
      $N_de_Documento = $value->id;
      $Referencia = $value->concepto;
      $Fecha = "";
      $Agente = "";
      $Codigo_del_Proveedo = "";
      $Codigo_del_Cliente = "";
      $Nombre_del_cliente = "";
      $Domicilio_del_cliente = "";
      $Poblacion = "";
      $CP = "";
      $Provinci = "";
      $NIF = "";
      $Tipo_de_IVA = "";
      $Recargo_de_equivalencia = "";
      $Teléfono_del_cliente = "";
      $Almacen = "";
      $Importe_neto  = "";
      $Importe_neto_2 = "";
      $Importe_neto_3 = "";
      $Porcentaje_de_descuento_1 = "";
      $Porcentaje_de_descuento_2 = "";
      $Porcentaje_de_descuento  = "";
      $Importe_descuento_1 = "";
      $Importe_descuento_2 = "";
      $Importe_descuento_3 = "";
      $Porcentaje_pronto_pago_1 = "";
      $Porcentaje_pronto_pago = "";
      $Porcentaje_pronto_pago_3 = "";
      $Importe_pronto_pago_1 = "";
      $Importe_pronto_pago_2 = "";
      $Importe_pronto_pago_3 = "";
      $Porcentaje_Portes  = "";
      $Porcentaje_Portes_2 = "";
      $Porcentaje_Portes_3 = "";
      $Importe_portes_1 = "";
      $Importe_portes_2 = "";
      $Importe_portes_3 = "";
      $Porcentaje_financiacion  = "";
      $Porcentaje_financiacion_2 = "";
      $Porcentaje_financiacion_3 = "";
      $Importe_financiacion_1 = "";
      $Importe_financiacion_2 = "";
      $Importe_financiacion = "";
      $Base_Disponible_1 = "";
      $Base_Disponible_2 = "";
      $Base_disponible_3 = "";
      $Porcentaje_de_IVA_1 = "";
      $Porcentaje_de_IVA_2 = "";
      $Porcentaje_de_IVA_ = "";
      $Importe_de_IVA_1 = "";
      $Importe_de_IVA_2 = "";
      $Importe_de_IVA = "";
      $Porcentaje_de_recargo_de_equivalencia_1 = "";
      $Porcentaje_de_recargo_de_equivalencia_2 = "";
      $Porcentaje_de_recargo_de_equivalencia  = "";
      $Importe_de_recargo_de_equivalencia_1 = "";
      $Importe_de_recargo_de_equivalencia_2 = "";
      $Importe_de_recargo_de_equivalencia  = "";
      $Porcentaje_de_la_retencion = "";
      $importe_de_la_retencion = "";
      if ($value->uso_beneficio_global === 1){
         $beneficio = $obra->beneficio;
      }else{
         $beneficio = $value->beneficio;
      };
      $Total = $value->precio_total * (1 + ($beneficio * 0.01));
      $Forma_de_Pago = "";
      $Plazo_de_entrega = "";
      $Tiempo_de_validez = "";
      $Porte = "";
      $Texto_de_portes = "";
      $linea_de_observaciones_1 = "";
      $linea_de_observaciones_2 = "";
      $Direccion_de_entrega = "";
      $Estado_del_presupuesto = "";
      $Imprimir_Presupuest = "";
      $Imprimir_hoja_de_condiciones_1 = "";
      $imprimir_factura_pro_forma = "";
      $Imprimir_hoja_de_condiciones_2 = "";
      $Codigo_hoja_de_condiciones  = "";
      $Codigo_hoja_de_condiciones_2 = "";
      $Anotaciones_privadas_del_documento = "";
      $Documentos_asociados_al_documento = "";
      $Comentarios_despues_de_las_lineas_de_detall = "";
      $Usuario_que_creo_el_documento = "";
      $Último_usuario_que_modifico_el_documento = "";
      $Fax_del_presupuesto = "";
      $Importe_neto_exento = "";
      $Porcentaje_de_descuento_exent = "";
      $Importe_de_descuento_exento = "";
      $Porcentaje_de_pronto_pago_exento= "";
      $Importe_de_pronto_pago_exento = "";
      $Porcentaje_de_portes_exento = "";
      $Importe_de_descuento_exent = "";
      $Porcentaje_de_financiacion_exento = "";
      $Importe_de_financiacion_exento = "";
      $Base_imponible_exenta = "";
      $Enviado_por_mail = "";
      $Permisos_y_contrasena_del_document = "";
      $Hora_de_creacion = "";
      $Carpeta_asocia = "";

      $data[$i] = [$Tipo_de_Documento, $N_de_Documento, $Referencia, $Fecha, $Agente, $Codigo_del_Proveedo,
      $Codigo_del_Cliente, $Nombre_del_cliente, $Domicilio_del_cliente, $Poblacion, $CP,
      $Provinci, $NIF, $Tipo_de_IVA, $Recargo_de_equivalencia, $Teléfono_del_cliente, $Almacen,
      $Importe_neto , $Importe_neto_2, $Importe_neto_3, $Porcentaje_de_descuento_1,
      $Porcentaje_de_descuento_2, $Porcentaje_de_descuento , $Importe_descuento_1,
      $Importe_descuento_2, $Importe_descuento_3, $Porcentaje_pronto_pago_1,
      $Porcentaje_pronto_pago, $Porcentaje_pronto_pago_3, $Importe_pronto_pago_1,
      $Importe_pronto_pago_2, $Importe_pronto_pago_3, $Porcentaje_Portes,
      $Porcentaje_Portes_2, $Porcentaje_Portes_3, $Importe_portes_1, $Importe_portes_2,
      $Importe_portes_3, $Porcentaje_financiacion , $Porcentaje_financiacion_2,
      $Porcentaje_financiacion_3, $Importe_financiacion_1, $Importe_financiacion_2,
      $Importe_financiacion, $Base_Disponible_1, $Base_Disponible_2, $Base_disponible_3,
      $Porcentaje_de_IVA_1, $Porcentaje_de_IVA_2, $Porcentaje_de_IVA_, $Importe_de_IVA_1,
      $Importe_de_IVA_2, $Importe_de_IVA, $Porcentaje_de_recargo_de_equivalencia_1,
      $Porcentaje_de_recargo_de_equivalencia_2, $Porcentaje_de_recargo_de_equivalencia ,
      $Importe_de_recargo_de_equivalencia_1, $Importe_de_recargo_de_equivalencia_2,
      $Importe_de_recargo_de_equivalencia , $Porcentaje_de_la_retencion,
      $importe_de_la_retencion, $Total, $Forma_de_Pago, $Plazo_de_entrega, $Tiempo_de_validez,
      $Porte, $Texto_de_portes, $linea_de_observaciones_1, $linea_de_observaciones_2,
      $Direccion_de_entrega, $Estado_del_presupuesto, $Imprimir_Presupuest, $Imprimir_hoja_de_condiciones_1,
      $imprimir_factura_pro_forma, $Imprimir_hoja_de_condiciones_2, $Codigo_hoja_de_condiciones,
      $Codigo_hoja_de_condiciones_2, $Anotaciones_privadas_del_documento, $Documentos_asociados_al_documento,
      $Comentarios_despues_de_las_lineas_de_detall, $Usuario_que_creo_el_documento,
      $Último_usuario_que_modifico_el_documento, $Fax_del_presupuesto, $Importe_neto_exento,
      $Porcentaje_de_descuento_exent, $Importe_de_descuento_exento, $Porcentaje_de_pronto_pago_exento,
      $Importe_de_pronto_pago_exento, $Porcentaje_de_portes_exento, $Importe_de_descuento_exent,
      $Porcentaje_de_financiacion_exento, $Importe_de_financiacion_exento, $Base_imponible_exenta,
      $Enviado_por_mail, $Permisos_y_contrasena_del_document, $Hora_de_creacion, $Carpeta_asocia];

      $i++;
    };
    Excel::create('PRE', function($excel) use ($data){
        $excel->sheet('Hoja1', function($sheet) use ($data){
          //Presupuesto pág 44 factusol 2017
          //http://www.sdelsol.es/2017EV/Documentos/FactuSOL%20Importacion%20Excel%20Calc.pdf
          $sheet->fromArray($data, null, 'A1', false, false);
        });
    })->export('xlsx');
    return back();
  }

}
