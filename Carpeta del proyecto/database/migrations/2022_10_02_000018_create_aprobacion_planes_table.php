<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAprobacionPlanesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'aprobacion_planes';

    /**
     * Run the migrations.
     * @table aprobacion_planes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_actividad_ap');
            $table->date('fecha_aprobacion');
            $table->integer('id_usuario_aprobacion');
            $table->char('aprobado', 2)->default('NO');

            $table->index(["id_actividad_ap"], 'fk_aprobacion_planes_actividades1_idx');


            $table->foreign('id_actividad_ap', 'fk_aprobacion_planes_actividades1_idx')
                ->references('id')->on('actividades')
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
