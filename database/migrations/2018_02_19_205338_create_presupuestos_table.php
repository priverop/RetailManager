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
            $table->integer('precio_final')->default(0);
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
