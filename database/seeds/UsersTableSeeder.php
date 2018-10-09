<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();  //清空資料庫

        \App\User::create([
            'name' => '系統管理員',
            'username' => "admin",
            'password' => bcrypt(env('DEFAULT_USER_PWD')),
            'admin' =>'1',
        ]);
    }
}
