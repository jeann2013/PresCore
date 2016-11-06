<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationmedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservationmedicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_company');
            $table->integer('id_medico');
            $table->date('datestart');
            $table->time('timestart');
            $table->date('dateend');
            $table->time('timeend');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->index('id_user');
            $table->index('id_company');
            $table->index('id_medico');
            $table->index('datestart');
            $table->index('dateend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservationmedicos');
    }
}
