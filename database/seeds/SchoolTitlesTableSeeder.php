<?php

use Illuminate\Database\Seeder;

class SchoolTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SchoolTitle::truncate();  //清空資料庫
        \App\SchoolTitle::create([
            'order_by'=>'1',
            'name' => '校長',
            'short_name' => '校長',
            'title_kind' => 1,
            'school_room_id' => 1,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'2',
            'name' => '教務主任',
            'short_name' => '主任',
            'title_kind' => 2,
            'school_room_id' => 2,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'3',
            'name' => '學務主任',
            'short_name' => '主任',
            'title_kind' => 2,
            'school_room_id' => 3,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'4',
            'name' => '總務主任',
            'short_name' => '主任',
            'title_kind' => 2,
            'school_room_id' => 4,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'5',
            'name' => '輔導主任',
            'short_name' => '主任',
            'title_kind' => 2,
            'school_room_id' => 5,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'6',
            'name' => '教學組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 2,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'7',
            'name' => '註冊組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 2,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'8',
            'name' => '資訊組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 2,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'9',
            'name' => '訓育組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 3,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'10',
            'name' => '生教組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 3,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'11',
            'name' => '衛生組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 3,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'12',
            'name' => '體育組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 3,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'13',
            'name' => '事務組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 4,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'14',
            'name' => '出納組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 4,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'15',
            'name' => '文書組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 4,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'16',
            'name' => '輔導組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 5,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'17',
            'name' => '資料組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 5,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'18',
            'name' => '特教組長',
            'short_name' => '組長',
            'title_kind' => 4,
            'school_room_id' => 5,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'19',
            'name' => '級任導師',
            'short_name' => '教師',
            'title_kind' => 6,
            'school_room_id' => 8,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'20',
            'name' => '科任教師',
            'short_name' => '教師',
            'title_kind' => 7,
            'school_room_id' => 9,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'21',
            'name' => '代理教師',
            'short_name' => '教師',
            'title_kind' => 10,
            'school_room_id' => 2,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'22',
            'name' => '人事主任',
            'short_name' => '主任',
            'title_kind' => 3,
            'school_room_id' => 6,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'23',
            'name' => '主計主任',
            'short_name' => '主任',
            'title_kind' => 3,
            'school_room_id' => 7,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'24',
            'name' => '總務處幹事',
            'short_name' => '幹事',
            'title_kind' =>12,
            'school_room_id' => 4,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'25',
            'name' => '護理師',
            'short_name' => '護理師',
            'title_kind' =>13,
            'school_room_id' => 3,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'26',
            'name' => '工友',
            'short_name' => '工友',
            'title_kind' =>15,
            'school_room_id' => 4,
        ]);

        \App\SchoolTitle::create([
            'order_by'=>'27',
            'name' => '警衛',
            'short_name' => '警衛',
            'title_kind' =>14,
            'school_room_id' => 4,
        ]);
    }
}
