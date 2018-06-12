<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaterialProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('material_proveedor', function (Blueprint $table) {

        $table->integer('proveedor_id')->unsigned();
        $table->foreign('proveedor_id')->references('id')
            ->on('proveedors')->onDelete('cascade');

        $table->integer('material_id')->unsigned();
        $table->foreign('material_id')->references('id')
            ->on('materials')->onDelete('cascade');
        $table->string('unidad')->default("Unidad");
        $table->integer('descuento')->default(0);
        $table->integer('min_unidades')->default(1);
        $table->double('precio', 8, 2);

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
        Schema::dropIfExists('material_proveedor');
    }
}
