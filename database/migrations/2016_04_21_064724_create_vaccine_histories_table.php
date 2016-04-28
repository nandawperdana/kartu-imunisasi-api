<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccineHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_histories', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('child_id')->unsigned();

        $table->integer('vaccine_id')->unsigned();
        $table->date('date');
        $table->string('place');
        $table->foreign('attribute_id')
                  ->references('id')->on('attributes')
                  ->onDelete('cascade');
        $table->foreign('child_id')
                  ->references('id')->on('children')
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
        Schema::drop('vaccineHistory');
    }
}
