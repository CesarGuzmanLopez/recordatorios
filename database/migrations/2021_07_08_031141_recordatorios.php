<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recordatorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create("items", function (Blueprint $table) {
            $table->id();
            $table->string("Serie")->nullable();
            $table->string("Motor")->unique()->nullable();
            $table->string("placas")->unique()->nullable();
            $table->string("Descripcion")->nullable();
            $table->string("kilometros")->unique()->nullable();
            $table->string("poliza")->nullable();
            $table->string("departamento")->nullable();
            $table->date("Ultimo_mantenimiento")->nullable();
            $table->timestamps();
        });

        Schema::create('avisos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_Usuario")->comment("Usuario que recibira el mensaje");
            $table->unsignedBigInteger("ID_item")->nullable();
            $table->unsignedBigInteger("Medio_de_Aviso")->comment("1.- whtasapp 2.- correo, 3 ambos");
            $table->text("Descripcion")->nullable();
            $table->date("Fecha_de_recordatorio");
            $table->timestamps();
            $table->foreign('ID_Usuario')->references('id')->on('users')->constrained();;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('Avisos');
    }

}
