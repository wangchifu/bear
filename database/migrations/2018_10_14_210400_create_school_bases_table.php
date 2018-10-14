<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_bases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');//教育部六碼代號
            $table->string('full_name');//中文名稱全銜
            $table->string('name');//中文名稱
            $table->string('short_name');//中文名稱短稱
            $table->string('english_name');//英文名稱
            $table->string('address');//地址
            $table->string('telephone_number');//電話號碼
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
        Schema::dropIfExists('school_bases');
    }
}
