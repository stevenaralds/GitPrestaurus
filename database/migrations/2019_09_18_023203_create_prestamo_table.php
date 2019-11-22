<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->Integer('monto')->unsigned()->default(0);
            $table->Integer('interes')->unsigned()->default(0);
            $table->Integer('totalapagar')->unsigned()->default(0);
            $table->Integer('saldo')->unsigned()->default(0);
            $table->String('formapago')->default(0); // semanal mensual diario
            $table->Integer('nrocuotas')->unsigned()->default(0);
            $table->Integer('vlrcuota')->unsigned()->default(0);
            
            $table->string('diaspago')->default(0);


            $table->String('estado');


            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            //relation
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade') ->onUpdate('cascade');
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
        Schema::dropIfExists('prestamo');
    }
}
