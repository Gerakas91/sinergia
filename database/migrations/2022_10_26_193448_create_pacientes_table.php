<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipoidentificacion')->unsigned();
            $table->foreign('tipoidentificacion')->references('id')->on('tipo_identificacions');
            $table->string('numeroidentificacion');
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('genero');
            $table->integer('iddepartamento')->unsigned();
            $table->foreign('iddepartamento')->references('id')->on('departamentos');
            $table->integer('idmunicipio')->unsigned();
            $table->foreign('idmunicipio')->references('id')->on('municipios');
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
        Schema::dropIfExists('pacientes');
    }
}
