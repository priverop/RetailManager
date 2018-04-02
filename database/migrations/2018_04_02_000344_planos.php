<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Planos extends Migration
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
        $table->integer('presupuesto_id')->unsigned();
        $table->foreign('presupuesto_id')->references('id')
            ->on('presupuestos')->onDelete('cascade');
        $table->string('filename');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
