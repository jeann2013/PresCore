<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firtsname');
            $table->string('lastname');
            $table->string('user');
            $table->string('password');
            $table->integer('id_company');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->index(['user', 'id_company']);
        });

        // Schema::table('users', function(Blueprint $table)
        // {
        //     $table->foreign('id_company')->references('id')->on('companys');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
