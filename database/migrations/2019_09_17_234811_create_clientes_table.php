<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cedula')->unique();
            $table->string('nombre');
            $table->string('tel');
            $table->string('cel');
            $table->string('dir');
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

             //relation
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
