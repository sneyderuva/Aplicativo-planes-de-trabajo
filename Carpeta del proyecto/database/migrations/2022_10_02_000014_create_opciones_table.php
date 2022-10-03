<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'opciones';

    /**
     * Run the migrations.
     * @table opciones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->mediumIncrements('id');
            $table->integer('id_categoria');
            $table->string('nombre', 45);
            $table->tinyInteger('valor');

            $table->index(["id_categoria"], 'fk_opciones_categoria1_idx');


            $table->foreign('id_categoria', 'fk_opciones_categoria1_idx')
                ->references('id')->on('categorias')
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
