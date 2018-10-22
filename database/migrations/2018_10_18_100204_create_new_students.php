<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('year');//入學年
            $table->tinyInteger('has_study');//就讀狀態0不就讀，1就讀,2特教班
            $table->string('reason')->nullable();//不就讀的原因
            $table->string('person_id')->unique()->nullable();//身分證
            $table->string('name');//姓名
            $table->tinyInteger('sex')->nullable();//性別
            $table->string('birthday')->nullable();//生日
            $table->string('parent')->nullable();//家長
            $table->string('residence_address')->nullable();//戶籍地址
            $table->string('residence_date')->nullable();//戶籍遷入日期
            $table->string('mailing_address')->nullable();//通訊地址
            $table->string('city_call')->nullable();//市話
            $table->string('cell_number')->nullable();//手機號碼
            $table->string('elementary_school')->nullable();//國小校名
            $table->string('elementary_class')->nullable();//國小班級
            $table->string('numbering');//臨時編號
            $table->string('student_sn')->nullable();//學號
            $table->tinyInteger('new_class')->nullable();//新班級
            $table->tinyInteger('new_num')->nullable();//新座號
            $table->tinyInteger('type')->nullable();//編班類別 :0為一般生,1為特教生,2為雙胞胎同班,3為雙胞胎不同班
            $table->string('another')->nullable();//雙胞胎的另一個編號
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
        Schema::dropIfExists('new_students');
    }
}
