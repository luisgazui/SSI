<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Createperfiles_prosesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles_proses', function (Blueprint $table) {
            $table->increments('id');
            $table->increment('ID_Usuario');
            $table->string('Nombre');
            $table->string('Perfil prose actual');
            $table->string('Participa en prose');
            $table->string('A partir de');
            $table->integer('idPerfil');
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
        Schema::drop('perfiles_proses');
    }
}
