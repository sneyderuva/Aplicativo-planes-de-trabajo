<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evidencias';

    /**
     * Run the migrations.
     * @table evidencias
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_tarea');
            $table->integer('id_usuario_profesor');
            $table->string('comentario', 250)->nullable();
            $table->string('directorio')->nullable();
            $table->date('fecha_de_carga');
            $table->time('hora_de_carga');
            $table->string('porcentaje_avance', 45);

            $table->index(["id_tarea"], 'fk_evidencias_tareas1_idx');


            $table->foreign('id_tarea', 'fk_evidencias_tareas1_idx')
                ->references('id')->on('tareas')
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
