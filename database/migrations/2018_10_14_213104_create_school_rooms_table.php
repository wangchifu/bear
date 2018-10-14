<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//處室名稱
            $table->string('telephone_number')->nullable();//電話
            $table->string('fax')->nullable();//傳真
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
        Schema::dropIfExists('school_rooms');
    }
}
