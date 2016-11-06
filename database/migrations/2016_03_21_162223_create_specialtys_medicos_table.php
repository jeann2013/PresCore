<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtysMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialtys_medicos', function (Blueprint $table) {
            $table->increments('id');      
            $table->integer('id_medico');
            $table->integer('id_specialty');
            $table->timestamps();
            $table->index('id_medico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('specialtys_medicos');
    }
}
