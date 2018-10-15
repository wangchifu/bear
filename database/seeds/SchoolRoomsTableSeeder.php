<?php

use Illuminate\Database\Seeder;

class SchoolRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SchoolRoom::truncate();  //清空資料庫

        $item = [
            '校長室',
            '教務處',
            '學務處',
            '總務處',
            '輔導室',
            '人事室',
            '會計室',
            '級任導師',
            '科任教師',
            '資源班',
            '特教班',
            '家長會',
            '其他',
            ];

        foreach($item as $v){
            \App\SchoolRoom::create([
                'name' => $v,
            ]);
        }
    }
}
