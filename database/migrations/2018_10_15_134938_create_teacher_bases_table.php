<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_bases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');//與user table關聯
            $table->unsignedInteger('school_room_id')->nullable();//處室代碼
            $table->unsignedInteger('title_kind_id')->nullable();//職別代碼
            $table->unsignedInteger('school_title_id')->nullable();//職稱代碼
            $table->string('person_id')->nullable();//身分證
            $table->tinyInteger('sex')->nullable();//性別
            $table->string('birthday')->nullable();//生日
            $table->string('telephone_number')->nullable();//電話
            $table->string('cell_number')->nullable();//手機號碼
            $table->string('email')->nullable();//電子郵件
            $table->string('address')->nullable();//地址
            $table->string('photo')->nullable();//照片
            $table->text('edu_key')->nullable();//edu_key openid使用
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
        Schema::dropIfExists('teacher_bases');
    }
}
