<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('n_documento')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('id_tipo_usuario');
            $table->string('id_tipo_documento');

            $table->foreign('id_tipo_usuario')
                ->references('id')->on('tipo_usuarios');
            $table->foreign('id_tipo_documento')
                ->references('id')->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
