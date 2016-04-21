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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('gender', ['L','P']);
            $table->string('avatarUrl');
            $table->string('country');
            $table->string('state');
            $table->string('address');
            $table->string('phone');
            $table->string('statusInfo');
            $table->string('profession')->unsigned();
            $table->string('tempatLahir');
            $table->string('tglLahir');
            $table->string('educLevId')->unsigned();
            $table->string('imgUsrFileName');
            $table->string('imgUsrFilePath');
            $table->string('lastStudy');
            $table->string('statusInfoUpAt');
            $table->rememberToken();
            $table->foreign('educLevId')
                  ->references('id')->on('attributes')
                  ->onDelete('cascade');
            $table->foreign('profession')
                  ->references('id')->on('attributes')
                  ->onDelete('cascade');
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
        Schema::drop('users');
    }
}
