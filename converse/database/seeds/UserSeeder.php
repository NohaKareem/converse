<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Sample user records
     * @var array
     */
    private $users = [
        ['first_name' => 'John', 'last_name' => 'Doe', 'email' => 'johndoe@example.com', 'mobile_number' => '12345678975', 'password' => '12345678'],
        ['first_name' => 'Jane', 'last_name' => 'Doe', 'email' => 'janedoe@example.com', 'mobile_number' => '12345678976', 'password' => '12345678'],
        ['first_name' => 'Alice', 'last_name' => 'Doe', 'email' => 'alicedoe@example.com', 'mobile_number' => '12345678976', 'password' => '12345678'],
        ['first_name' => 'Bob', 'last_name' => 'Tim', 'email' => 'bobtim@example.com', 'mobile_number' => '12345678976', 'password' => '12345678']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach ($this->users as $user) {
            User::firstOrCreate([
              'first_name' => $user['first_name'],
              'last_name' => $user['last_name'], 
              'email' => $user['email'], 
              'mobile_number' => $user['mobile_number'],
              'password' => Hash::make($user['password']) 
            ]);
          }
    }
}
