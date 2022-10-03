<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'actividades';

    /**
     * Run the migrations.
     * @table actividades
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_plan_trabajo');
            $table->integer('id_tipo_actividad');
            $table->string('actividad', 45);
            $table->integer('horas_semanales');
            $table->integer('horas_semestre');
            $table->string('alcance', 45)->nullable();

            $table->index(["id_tipo_actividad"], 'fk_actividades_tipo_actividades1_idx');

            $table->index(["id_plan_trabajo"], 'fk_actividades_plan_de_trabajo1_idx');


            $table->foreign('id_tipo_actividad', 'fk_actividades_tipo_actividades1_idx')
                ->references('id')->on('tipo_actividades')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_plan_trabajo', 'fk_actividades_plan_de_trabajo1_idx')
                ->references('id')->on('p_trabajos')
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
