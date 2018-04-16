<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('obra_id')->unsigned();
            $table->foreign('obra_id')->references('id')->on('obras')->onDelete('cascade');
            $table->timestamp('fecha');
            $table->string('concepto')->default("Mueble");
            $table->string('caracteristicas')->nullable();
            $table->integer('unidades')->default(1);
            $table->string('estado')->default('por comprobar');
            $table->integer('beneficio')->default(30);
            $table->integer('desperdicio')->default(10);
            $table->double('precio_total_unidad', 8, 2)->default(0);
            $table->double('precio_total', 8, 2)->default(0);
            $table->boolean('uso_beneficio_global')->default(true);

            $table->integer('t_seccionadora')->default(0);
            $table->string('o_seccionadora')->default('Corte');
            $table->double('precio_t_seccionadora')->default(0);
            $table->double('total_seccionadora')->default(0);
            $table->integer('t_escuadradora')->default(0);
            $table->string('o_escuadradora')->default('Ingletado');
            $table->double('precio_t_escuadradora')->default(0);
            $table->double('total_escuadradora')->default(0);
            $table->integer('t_elaboracion')->default(0);
            $table->string('o_elaboracion')->default('Macizos');
            $table->double('precio_t_elaboracion')->default(0);
            $table->double('total_elaboracion')->default(0);
            $table->integer('t_canteadora')->default(0);
            $table->string('o_canteadora')->default('Canteado');
            $table->double('precio_t_canteadora')->default(0);
            $table->double('total_canteadora')->default(0);
            $table->integer('t_punto')->default(0);
            $table->string('o_punto')->default('Mecanizado');
            $table->double('precio_t_punto')->default(0);
            $table->double('total_punto')->default(0);
            $table->integer('t_prensa')->default(0);
            $table->string('o_prensa')->default('Pegado de Formica');
            $table->double('precio_t_prensa')->default(0);
            $table->double('total_prensa')->default(0);


            $table->integer('maquinas_operarios')->default(0);
            $table->integer('maquinas_horas_operario')->default(0);
            $table->string('maquinas_operacion')->default('No indicado');
            $table->double('maquinas_precio_unidad')->default(0);
            $table->double('total_maquinas')->default(0);
            $table->integer('bancos_operarios')->default(0);
            $table->integer('bancos_horas_operario')->default(0);
            $table->string('bancos_operacion')->default('No indicado');
            $table->double('bancos_precio_unidad')->default(0);
            $table->double('total_bancos')->default(0);
            $table->integer('maquinas_oficial_1_operarios')->default(0);
            $table->integer('maquinas_oficial_1_horas_operario')->default(0);
            $table->string('maquinas_oficial_1_operacion')->default('No indicado');
            $table->double('maquinas_oficial_1_precio_unidad')->default(0);
            $table->double('total_maquinas_oficial_1')->default(0);
            $table->integer('producto_ter_1_operarios')->default(0);
            $table->integer('producto_ter_1_horas_operario')->default(0);
            $table->string('producto_ter_1_operacion')->default('No indicado');
            $table->double('producto_ter_1_precio_unidad')->default(0);
            $table->double('total_producto_ter_1')->default(0);
            $table->integer('productor_ter_2_operarios')->default(0);
            $table->integer('productor_ter_2_horas_operario')->default(0);
            $table->string('productor_ter_2_operacion')->default('No indicado');
            $table->double('productor_ter_2_precio_unidad')->default(0);
            $table->double('total_productor_ter_2')->default(0);
            $table->integer('oficial_1_operarios')->default(0);
            $table->integer('oficial_1_horas_operario')->default(0);
            $table->string('oficial_1_operacion')->default('No indicado');
            $table->double('oficial_1_precio_unidad')->default(0);
            $table->double('total_oficial_1')->default(0);
            $table->integer('oficial_2_operarios')->default(0);
            $table->integer('oficial_2_horas_operario')->default(0);
            $table->string('oficial_2_operacion')->default('No indicado');
            $table->double('oficial_2_precio_unidad')->default(0);
            $table->double('total_oficial_2')->default(0);
            $table->integer('ayudante_operarios')->default(0);
            $table->integer('ayudante_horas_operario')->default(0);
            $table->string('ayudante_operacion')->default('No indicado');
            $table->double('ayudante_precio_unidad')->default(0);
            $table->double('total_ayudante')->default(0);



            $table->double('desplazamiento_unidad')->default(0);
            $table->double('total_desplazamiento')->default(0);
            $table->double('transporte_unidad')->default(0);
            $table->double('total_transporte')->default(0);
            $table->double('imprevistos_unidad')->default(0);
            $table->double('total_imprevistos')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos');
    }
}
