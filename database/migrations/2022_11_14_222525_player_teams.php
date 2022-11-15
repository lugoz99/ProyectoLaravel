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
            $table->bigInteger('player_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            //Hacer efectivo la relación
            $table->foreign('player_id')->references('id')
                ->on('players')
                ->onDelete('cascade');

            $table->foreign('team_id')->references('id')
                ->on('teams')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['player_id', 'team_id']);
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
