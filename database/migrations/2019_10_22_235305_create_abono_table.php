<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->Integer('nrocuotas')->unsigned()->default(0);
            $table->Integer('valor')->unsigned()->default(0);
            $table->Integer('saldo')->unsigned()->default(0);
            
            $table->timestamps();

           
            $table->unsignedBigInteger('prestamo_id');
            

            //relation
            $table->foreign('prestamo_id')->references('id')->on('prestamos')->onDelete('cascade') ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos');
    }
}
