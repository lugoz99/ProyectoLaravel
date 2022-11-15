<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionsRols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_rols', function (Blueprint $table) {
            $table->id();
            //Agregar las columnas que contendrán los datos foráneos
            $table->bigInteger('rol_id')->unsigned();
            $table->bigInteger('permission_id')->unsigned();
            //Hacer efectivo la relación
            $table->foreign('rol_id')->references('id')
                ->on('rols')
                ->onDelete('cascade');

            $table->foreign('permission_id')->references('id')
                ->on('permissions')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['rol_id', 'permission_id']);
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
