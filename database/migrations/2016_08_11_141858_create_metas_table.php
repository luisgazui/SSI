<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatemetasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->increments('id');
            $table->number('idUsuario');
            $table->string('Usuario');
            $table->string('Inspecciones');
            $table->string('Observaciones');
            $table->string('Reuniones');
            $table->string('Charlas');
            $table->string('Interacciones');
            $table->string('Empresa');
            $table->string('Departamento');
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
        Schema::drop('metas');
    }
}
