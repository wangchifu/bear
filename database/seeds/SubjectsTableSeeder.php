<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Subject::truncate();  //清空資料庫

        $item[1] = [
            '本國語文',
            '本土語言',
            '英語',
        ];
        $item[3] = [
          '生活',
          '美勞',
          '音樂',
        ];
        $item[6] = [
            '健康',
            '體育',
        ];
        $item[7] = [
            '美勞',
            '音樂',
        ];
        foreach($item as $k1=>$v1){
            foreach($v1 as $v2){
                \App\Subject::create([
                    'scope_id'=>$k1,
                    'name' => $v2,
                    'enable' => "1",
                ]);
            }
        }
    }
}
