<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tareas';

    /**
     * Run the migrations.
     * @table tareas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_actividad');
            $table->integer('id_p_trabajo');
            $table->string('descripcion');
            $table->string('descripcion2');


            $table->index(["id_actividad_t"], 'fk_tareas_actividades1_idx');


            $table->foreign('id_actividad_t', 'fk_tareas_actividades1_idx')
                ->references('id')->on('esactividads')
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
