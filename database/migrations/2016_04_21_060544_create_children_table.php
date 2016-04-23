<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->string('name');
        $table->string('birthplace');
        $table->date('birthday');
        $table->decimal('weight',5,2);
        $table->decimal('height',5,2);
        $table->string('FileNameFoto');
        $table->string('PathFoto');
        $table->enum('gender', ['L','P']);
        $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::drop('children');
    }
}
