<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('attribute_id')->unsigned();
        $table->string('message');
        $table->integer('month');
        $table->foreign('attribute_id')
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
        Schema::drop('reminders');
    }
}
