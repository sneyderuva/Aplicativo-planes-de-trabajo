<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePAcademicosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'p_academicos';

    /**
     * Run the migrations.
     * @table p_academicos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idfacultad');
            $table->string('nombre', 45);

            $table->index(["idfacultad"], 'fk_Programa academico_facultad1_idx');


            $table->foreign('idfacultad', 'fk_Programa academico_facultad1_idx')
                ->references('id')->on('facultades')
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
