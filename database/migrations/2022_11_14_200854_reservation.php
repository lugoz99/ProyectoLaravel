<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('fechaReserva');
            $table->string('estado');
            //Agregar las columnas que contendrán los datos foráneos
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('field_id')->unsigned();
            //Hacer efectivo la relación
            $table->foreign('team_id')->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('field_id')->references('id')
                ->on('fields')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['field_id', 'team_id']);
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
