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
        // $this->call(UsersTableSeeder::class);
        // disable foreign key checks before callign seeders for post and comment seeders
        // https://stackoverflow.com/a/28005195/1446598
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
    
}
