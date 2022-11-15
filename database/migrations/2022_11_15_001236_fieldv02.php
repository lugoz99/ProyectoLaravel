<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fieldv02 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {
            //Agregar la columna que contendrá el dato foráneo
            $table->bigInteger('tipoCancha_id')->unsigned();
            //Hacer efectivo la relación
            $table->foreign('tipoCancha_id')->references('id')
                                    ->on('fieldtype')
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
