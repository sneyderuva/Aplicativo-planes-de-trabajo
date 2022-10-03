<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesoresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'profesores';

    /**
     * Run the migrations.
     * @table profesores
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_programa');
            $table->string('tipo_documento', 45);
            $table->string('nombre', 45);
            $table->string('apellidos', 45);
            $table->integer('n_documento');
            $table->string('direccion', 45);
            $table->integer('telefono');
            $table->string('email', 45);
            $table->string('escalafon', 45);

            $table->index(["tipo_documento"], 'fk_profesor_tipo_documento_idx');

            $table->index(["id_programa"], 'fk_profesor_Programa academico1_idx');


            $table->foreign('tipo_documento', 'fk_profesor_tipo_documento_idx')
                ->references('id')->on('tipo_documentos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_programa', 'fk_profesor_Programa academico1_idx')
                ->references('id')->on('p_academicos')
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
