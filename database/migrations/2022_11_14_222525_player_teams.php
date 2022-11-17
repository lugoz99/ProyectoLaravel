<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlayerTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlayerTeams', function (Blueprint $table) {
            $table->id();
            //Agregar las columnas que contendrán los datos foráneos
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->string('numeroCamisa');
            //Hacer efectivo la relación
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('team_id')->references('id')
                ->on('teams')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
