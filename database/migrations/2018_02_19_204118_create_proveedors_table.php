<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('nombre');
            $table->string('direccion')->default("No insertado");
            $table->integer('cp')->default("0");
            $table->string('provincia')->default("No insertado");
            $table->integer('telefono')->default("0");
            $table->string('nif')->default("No insertado");
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
        Schema::dropIfExists('proveedors');
    }
}
