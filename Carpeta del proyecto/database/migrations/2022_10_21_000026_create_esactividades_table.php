<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Esactividad', function (Blueprint $table) {
            
            $table->increments('id');
            $table->int('id_plan_trabajo');
            $table->int('id_tipo_actividad');
            $table->int('horas_semanales');
            $table->int('horas_semestrales');
            $table->string('alcance');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Esactividad');
    }
}
