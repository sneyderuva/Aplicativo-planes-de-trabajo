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
            $table->integer('id_semestre', 45);
            $table->float('horas_semana', 5);
            $table->float('horas_semestre', 5);

            $table->foreign('id_profesor')
                ->references('id')->on('profesores');
            $table->foreign('id_p_academico')
                ->references('id')->on('p_academicos');
            $table->foreign('id_semestre')
                ->references('id')->on('semestres');
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
