<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_externos', function (Blueprint $table) {
          $table->increments('id')->unsigned()->unique();
          $table->integer('presupuesto_id')->references('id')->on('presupuestos')->onDelete('cascade');;
          $table->string('concepto')->default("No indicado");
          $table->string('proveedor_externo')->default("No indicado");
          $table->integer('unidades')->default(0);
          $table->double('ancho')->default(0);
          $table->double('alto')->default(0);
          $table->double('m2')->default(0);
          $table->double('precio_unidad')->default(0);
          $table->double('precio_total')->default(0);
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
        Schema::dropIfExists('material_externos');
    }
}
