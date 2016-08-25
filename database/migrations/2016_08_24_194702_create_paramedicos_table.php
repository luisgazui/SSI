<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateparamedicosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paramedicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdReporte');
            $table->date('Fecha');
            $table->string('Turno');
            $table->string('Incidentado');
            $table->string('Descripci¢n');
            $table->string('Categoria');
            $table->string('Severidad');
            $table->checkbox('CAS');
            $table->string('Empresa');
            $table->string('Area');
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
        Schema::drop('paramedicos');
    }
}
