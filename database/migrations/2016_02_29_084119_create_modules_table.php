<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('order');
            $table->integer('id_father');
            $table->string('url');
            $table->string('messages');
            $table->tinyInteger('status');
            $table->tinyInteger('visible');
            $table->timestamps();
            $table->index('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('modules');
    }
}
