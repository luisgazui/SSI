<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Createdepartamentos_prosesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos_proses', function (Blueprint $table) {
            $table->increments('id');
            $table->increment('id');
            $table->string('Departamento');
            $table->string('descripcionProse');
            $table->boolean('Habilitado');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departamentos_proses');
    }
}
