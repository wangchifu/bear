<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemeCouseDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seme_course_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year_seme');//學期，如 1061
            $table->tinyInteger('class_year');//1是一年級...6是六年級
            $table->unsignedInteger('days');//共幾天
            $table->text('school_days')->nullable();//序列化記錄這學期的每一天
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
        Schema::dropIfExists('seme_course_dates');
    }
}
