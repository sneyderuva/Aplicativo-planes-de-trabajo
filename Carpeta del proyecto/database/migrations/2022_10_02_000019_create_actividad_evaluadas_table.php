<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadEvaluadasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'actividad_evaluadas';

    /**
     * Run the migrations.
     * @table actividad_evaluadas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('actividades_id_actividad');
            $table->integer('rubrica_id_rubrica');
            $table->string('id_rubrica', 45);
            $table->string('id_actividad', 45);

            $table->index(["rubrica_id_rubrica"], 'fk_actividad_evaluar_rubrica1_idx');

            $table->index(["actividades_id_actividad"], 'fk_actividad_evaluar_actividades1_idx');


            $table->foreign('rubrica_id_rubrica', 'fk_actividad_evaluar_rubrica1_idx')
                ->references('id')->on('rubricas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('actividades_id_actividad', 'fk_actividad_evaluar_actividades1_idx')
                ->references('id')->on('actividades')
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
