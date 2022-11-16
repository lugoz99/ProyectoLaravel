<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SportTypesv01 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sportTypes', function (Blueprint $table) {
            //Agregar la columna que contendrá el dato foráneo
            $table->bigInteger('cancha_id')->unsigned();
            //Hacer efectivo la relación
            $table->foreign('cancha_id')->references('id')
                                    ->on('fields')
                                    ->onDelete('cascade');
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
