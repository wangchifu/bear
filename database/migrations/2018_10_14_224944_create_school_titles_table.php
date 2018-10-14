<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_titles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_by');//排序
            $table->string('name');//職位名稱
            $table->string('short_name');//職位名稱
            $table->unsignedInteger('title_kind');//職稱類別
            $table->unsignedInteger('school_room_id');//所在處室
            $table->string('file')->nullable();//簽章檔
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
        Schema::dropIfExists('school_titles');
    }
}
