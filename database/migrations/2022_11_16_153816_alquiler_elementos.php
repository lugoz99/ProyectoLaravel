<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlquilerElementos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('rentElements', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('cantidad');
            $table->string('tipo');
            $table->string('descripcion');
            $table->string('marca');

            $table->bigInteger('reservation_id')->unsigned();
            //Hacer efectivo la relación
            $table->foreign('reservation_id')->references('id')
                                    ->on('reservations')
                                    ->onDelete('cascade');
            $table->timestamps();

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
