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
            'active'=>'checked',
        ]);


        \App\Module::create([
            'name' => '教務處',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'2',
            'active'=>'checked',
        ]);
        \App\Module::create([
            'name' => '教學組',
            'type' => "folder",
            'module_id' => "2",
            'order_by' =>'1',
            'active'=>'checked',
        ]);
        \App\Module::create([
            'name' => '註冊組',
            'type' => "folder",
            'module_id' => "2",
            'order_by' =>'2',
            'active'=>'checked',
        ]);


        \App\Module::create([
            'name' => '學務處',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'3',
            'active'=>'checked',
        ]);
        \App\Module::create([
            'name' => '總務處',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'4',
            'active'=>'checked',
        ]);
        \App\Module::create([
            'name' => '輔導室',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'5',
            'active'=>'checked',
        ]);
        \App\Module::create([
            'name' => '系統管理',
            'type' => "folder",
            'module_id' => "0",
            'order_by' =>'6',
            'active'=>'checked',
        ]);

        \App\Module::create([
            'name' => '模組權限管理',
            'english_name'=>'modules_manage',
            'type' => "module",
            'module_id' => "8",
            'order_by' =>'1',
            'active'=>'checked',
        ]);

        \App\Module::create([
            'name' => '身分模擬',
            'english_name'=>'simulation',
            'type' => "module",
            'module_id' => "8",
            'order_by' =>'2',
            'active'=>'checked',
        ]);

        \App\Module::create([
            'name' => '學校設定',
            'english_name'=>'school_setup',
            'type' => "module",
            'module_id' => "2",
            'order_by' =>'1',
            'active'=>'checked',
        ]);

        \App\Module::create([
            'name' => '教師管理',
            'english_name'=>'teachers_manage',
            'type' => "module",
            'module_id' => "2",
            'order_by' =>'1',
            'active'=>'checked',
        ]);

        \App\Module::create([
            'name' => '學期初設定',
            'english_name'=>'every_year_setup',
            'type' => "module",
            'module_id' => "2",
            'order_by' =>'2',
            'active'=>'checked',
        ]);

        \App\Module::create([
            'name' => '新生編班',
            'english_name'=>'temp_compile',
            'type' => "module",
            'module_id' => "4",
            'order_by' =>'1',
            'active'=>'checked',
        ]);

    }
}
