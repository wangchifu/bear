<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('scope_id')->nullable();//領域id
            $table->unsignedInteger('subject_id')->nullable();//分科id
            $table->string('year_seme');//學期，如 1061
            $table->unsignedInteger('class_sn');//班級，如 101
            $table->tinyInteger('class_year');//年級
            $table->tinyInteger('has_subject');//0無分科,1有分科
            $table->tinyInteger('sections');//節數
            $table->tinyInteger('need_exam');//0不計分,1要計分
            $table->tinyInteger('has_stage_test');//0不月考,1要月考
            $table->tinyInteger('rate')->nullable();//加權
            $table->unsignedInteger('scope_sort')->nullable();//領域排序
            $table->unsignedInteger('subject_sort')->nullable();//分科排序
            $table->unsignedInteger('curriculum_guideline_id')->nullable();//對應課綱領域id
            $table->unsignedInteger('k12ea_category')->nullable();//國教署類別
            $table->unsignedInteger('k12ea_area')->nullable();//國教署領域
            $table->unsignedInteger('k12ea_subject')->nullable();//國教署科目
            $table->unsignedInteger('k12ea_language')->nullable();//國教署語言別
            $table->unsignedInteger('k12ea_frequency')->nullable();//國教署???
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
        Schema::dropIfExists('courses');
    }
}
