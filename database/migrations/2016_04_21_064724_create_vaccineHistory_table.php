<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccineHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->increments('id');
        $table->integer('children_id')->unsigned();
        $table->date('date');
        $table->string('place');
        $table->string('vaccine_type');
        $table->foreign('children_id')
                  ->references('id')->on('children')
                  ->onDelete('cascade');
        $table->timestamps();

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
