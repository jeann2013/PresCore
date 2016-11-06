<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_company');
            $table->integer('id_medico');
            $table->integer('id_patients');
            $table->integer('id_equipment');
            $table->date('datestart');
            $table->time('timestart');
            $table->date('dateend');
            $table->time('timeend');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->index(['id_medico','id_patients','datestart','dateend']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planning');
    }
}

