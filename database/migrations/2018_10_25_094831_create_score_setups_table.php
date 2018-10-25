<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year_seme');//學期，如 1061
            $table->tinyInteger('class_year');//1是一年級...6是六年級
            $table->tinyInteger('performance_test_times');//月考次數//1一次，2是兩次，3是三次
            $table->string('test_ratio');//定期-平時比例，如 40-60
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
        Schema::dropIfExists('score_setups');
    }
}
