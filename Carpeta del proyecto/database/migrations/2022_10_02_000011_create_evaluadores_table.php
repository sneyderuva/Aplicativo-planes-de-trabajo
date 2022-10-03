<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluadoresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evaluadores';

    /**
     * Run the migrations.
     * @table evaluadores
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->smallInteger('dependencia_id_dependencia');
            $table->string('nombres_completos', 45);
            $table->string('documento', 45);
            $table->string('email', 45);
            $table->string('telefono', 45);
            $table->string('cargo', 45);

            $table->index(["dependencia_id_dependencia"], 'fk_evaluador_dependencia1_idx');


            $table->foreign('dependencia_id_dependencia', 'fk_evaluador_dependencia1_idx')
                ->references('id')->on('dependencia')
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
