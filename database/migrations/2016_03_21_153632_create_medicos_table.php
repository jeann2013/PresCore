<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firtsname');                        
            $table->string('lastname');                        
            $table->string('phone');    
            $table->string('cellphone');    
            $table->string('address');    
            $table->integer('id_user');
            $table->string('id_company');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->index('id_company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicos');
    }
}
