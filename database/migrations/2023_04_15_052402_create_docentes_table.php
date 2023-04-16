<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('iddocentes');
            $table->string('do_imagen',150)->nullable();
            $table->string('do_profesion',50)->nullable();
            $table->date('do_fecha_reg');
            $table->string('do_estado',10)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('idpersonas')->index('idpersonas');  
            $table->foreign('idpersonas')->references('idpersonas')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}
