<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FieldTypev01 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('FieldType', function (Blueprint $table) {
            //Agregar la columna que contendrá el dato foráneo
            $table->string('descripcion');
            $table->string('forma');
            $table->string('superficie');

            //Hacer efectivo la relación

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
