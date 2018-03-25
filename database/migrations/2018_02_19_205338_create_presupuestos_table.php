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
            $table->integer('beneficio')->default(0.3);
            $table->double('precio_final', 8, 2)->default(0);

            $table->integer('t_seccionadora')->default(0);
            $table->string('o_seccionadora')->default('No indicado');
            $table->integer('t_escuadradora')->default(0);
            $table->string('o_escuadradora')->default('No indicado');
            $table->integer('t_canteadora')->default(0);
            $table->string('o_canteadora')->default('No indicado');
            $table->integer('t_punto')->default(0);
            $table->string('o_punto')->default('No indicado');
            $table->integer('t_prensa')->default(0);
            $table->string('o_prensa')->default('No indicado');

            $table->integer('desplazamiento_unidad')->default(0);
            $table->integer('desplazamiento_beneficio')->default(0.1);
            $table->integer('transporte_unidad')->default(0);
            $table->integer('transporte_beneficio')->default(0.1);
            $table->integer('imprevistos_unidad')->default(0);
            $table->integer('imprevistos_beneficio')->default(0.1);
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
