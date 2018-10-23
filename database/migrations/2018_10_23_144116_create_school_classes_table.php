<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year_seme');//學期
            $table->unsignedInteger('class_sn');//班級代碼，如101
            $table->tinyInteger('class_type');//1是一二三，2是甲乙丙，3是忠孝仁
            $table->string('class_kind');//班級別：一般班，特教班(混齡)
            $table->unsignedInteger('teacher_1')->nullable();//導師1的user_id
            $table->unsignedInteger('teacher_2')->nullable();//導師2的user_id
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
        Schema::dropIfExists('school_classes');
    }
}
