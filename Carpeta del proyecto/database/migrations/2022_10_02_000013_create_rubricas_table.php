<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubricasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'rubricas';

    /**
     * Run the migrations.
     * @table rubricas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_criterio_eval');
            $table->string('concepto', 45);
            $table->timestamp('fecha');

            $table->index(["id_criterio_eval"], 'fk_rubrica_criterios_eval1_idx');


            $table->foreign('id_criterio_eval', 'fk_rubrica_criterios_eval1_idx')
                ->references('id')->on('criterios')
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
