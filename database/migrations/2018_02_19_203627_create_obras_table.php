<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('v_id')->default(1);
            $table->integer('version')->default(1);
            $table->integer('v_activa')->default(1);
            $table->integer('v_ultima')->default(1);
            $table->string('nombre');
            $table->date('fecha');
            $table->double('beneficio')->default(30);
            $table->double('precio_total', 8, 2)->default(0);
            $table->double('precio_total_beneficio', 8, 2)->default(0);
            $table->double('porcentaje_montaje', 8, 2)->default(0);
            $table->double('coste_montaje', 8, 2)->default(0);
            $table->double('total_montaje', 8, 2)->default(0);
            $table->double('porcentaje_transporte', 8, 2)->default(0);
            $table->double('coste_transporte', 8, 2)->default(0);
            $table->double('total_transporte', 8, 2)->default(0);
            $table->double('margen_estructural', 8, 2)->default(0);
            $table->double('total_estructural', 8, 2)->default(0);
            $table->double('margen_comercial', 8, 2)->default(0);
            $table->double('total_comercial', 8, 2)->default(0);
            $table->double('total_IVA', 8, 2)->default(0);
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('obras');
    }
}
