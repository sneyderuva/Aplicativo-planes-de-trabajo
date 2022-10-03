<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePTrabajosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'p_trabajos';

    /**
     * Run the migrations.
     * @table p_trabajos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_profesor');
            $table->string('periodo_academico', 45);
            $table->string('dedicacion', 45);
            $table->string('tipo_vinculado', 45);
            $table->string('fecha_elaboracion', 45);

            $table->index(["id_profesor"], 'fk_plan_de_trabajo_profesor1_idx');


            $table->foreign('id_profesor', 'fk_plan_de_trabajo_profesor1_idx')
                ->references('id')->on('profesores')
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
