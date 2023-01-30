<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Subtareas', function (Blueprint $table) {
            
            $table->increments('id');
            $table->smallInteger('id_tarea');
            $table->smallInteger('id_p_trabajo_tarea');
            $table->string('titulo');
            $table->string('descripcion');
            $table->int('horas');
            $table->int('horas_semestre');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Subtareas');
    }
}
