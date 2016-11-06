<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_module');
            $table->string('id_company');
            $table->tinyInteger('views');
            $table->tinyInteger('inserts');
            $table->tinyInteger('modifys');
            $table->tinyInteger('deletes');            
            $table->timestamps();
        });

        // Schema::table('access', function(Blueprint $table)
        // {
        //     $table->foreign('id_user')->references('id')->on('users');
        //     $table->foreign('id_company')->references('id')->on('companys');
        //     $table->foreign('id_module')->references('id')->on('modules');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('access');
    }
}
