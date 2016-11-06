<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firtsname');
            $table->string('lastname');
            $table->string('iddocument');
            $table->string('address');
            $table->string('phone');
            $table->string('cell_phone');
            $table->integer('id_user');
            $table->integer('id_company');            
            $table->tinyInteger('status');
            $table->index('iddocument');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
