<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('module_id');//模組id
            $table->unsignedInteger('type');//授權種類：0全部教師；1處室；2職稱；3教師
            $table->unsignedInteger('allow_id')->nullable();//允許的school_roomm_id或school_title_id或user_id
            $table->tinyInteger('admin')->nullable();//1是該模組的管理權,null是一般
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
        Schema::dropIfExists('powers');
    }
}
