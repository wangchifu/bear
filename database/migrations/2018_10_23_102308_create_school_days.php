<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seme_start_date');//學期開始日
            $table->string('seme_stop_date');//學期結束日
            $table->string('start_date');//開學日
            $table->string('stop_date');//結業日
            $table->string('year_seme');//學期，如1061是106學年第1學期
            $table->tinyInteger('active')->nullable();//目前學期為1
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
        Schema::dropIfExists('school_days');
    }
}
