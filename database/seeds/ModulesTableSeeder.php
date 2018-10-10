<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Module::truncate();  //清空資料庫

        \App\Module::create([
            'name' => '校務行政',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'1',
            'active'=>'on',
        ]);


        \App\Module::create([
            'name' => '教務處',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'2',
            'active'=>'on',
        ]);
        \App\Module::create([
            'name' => '教學組',
            'type' => "folder",
            'module_id' => "2",
            'order_by' =>'1',
            'active'=>'on',
        ]);
        \App\Module::create([
            'name' => '註冊組',
            'type' => "folder",
            'module_id' => "2",
            'order_by' =>'2',
            'active'=>'on',
        ]);


        \App\Module::create([
            'name' => '學務處',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'3',
            'active'=>'on',
        ]);
        \App\Module::create([
            'name' => '總務處',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'4',
            'active'=>'on',
        ]);
        \App\Module::create([
            'name' => '輔導室',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'5',
            'active'=>'on',
        ]);
        \App\Module::create([
            'name' => '系統管理',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'6',
            'active'=>'on',
        ]);

        \App\Module::create([
            'name' => '模組權限管理',
            'type' => "module",
            'module_id' => "8",
            'order_by' =>'1',
            'active'=>'on',
        ]);

    }
}
