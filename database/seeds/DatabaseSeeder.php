<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(SchoolRoomsTableSeeder::class);
        $this->call(SchoolTitlesTableSeeder::class);
        $this->call(CurriculumGuidelinesTableSeeder::class);
        $this->call(ScopesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
    }
}
