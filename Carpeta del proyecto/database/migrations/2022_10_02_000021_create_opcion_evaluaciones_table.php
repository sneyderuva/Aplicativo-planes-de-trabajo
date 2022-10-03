<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcionEvaluacionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'opcion_evaluaciones';

    /**
     * Run the migrations.
     * @table opcion_evaluaciones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->mediumInteger('opciones_id_opciones');
            $table->integer('actividad_evaluar_id_actividad_evaluar');
            $table->integer('evaluador_id_evaluador');
            $table->tinyInteger('resultado');

            $table->index(["opciones_id_opciones"], 'fk_opciones_evaluacion_opciones1_idx');

            $table->index(["actividad_evaluar_id_actividad_evaluar"], 'fk_opciones_evaluacion_actividad_evaluar1_idx');

            $table->index(["evaluador_id_evaluador"], 'fk_opciones_evaluacion_evaluador1_idx');


            $table->foreign('opciones_id_opciones', 'fk_opciones_evaluacion_opciones1_idx')
                ->references('id')->on('opciones')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('actividad_evaluar_id_actividad_evaluar', 'fk_opciones_evaluacion_actividad_evaluar1_idx')
                ->references('id')->on('actividad_evaluadas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('evaluador_id_evaluador', 'fk_opciones_evaluacion_evaluador1_idx')
                ->references('id')->on('evaluadores')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
