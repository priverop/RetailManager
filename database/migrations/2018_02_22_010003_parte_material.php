<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParteMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('material_parte', function (Blueprint $table) {

        $table->integer('parte_id')->unsigned();
        $table->foreign('parte_id')->references('id')
            ->on('partes')->onDelete('cascade');

        $table->integer('material_id')->unsigned();
        $table->foreign('material_id')->references('id')
            ->on('materials')->onDelete('cascade');

        $table->integer('proveedor_id')->unsigned();
        $table->foreign('proveedor_id')->references('id')
            ->on('proveedors')->onDelete('cascade');

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
        Schema::dropIfExists('material_parte');
    }
}
