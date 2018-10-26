<?php

use Illuminate\Database\Seeder;

class ScopesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Scope::truncate();  //清空資料庫

        $item = [
            '語文',
            '數學',
            '生活',
            '社會',
            '自然',
            '健康與體育',
            '藝術與人文',
            '綜合活動',
            '科技',
            '彈性課程'
        ];
        foreach($item as $v){
            \App\Scope::create([
                'name' => $v,
                'enable' => "1",
            ]);
        }
    }
}
