<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
   /**
     * Sample post data
     * @var array
     */
    private $posts = [
        ['title' => 'Snowy weekend', 'text' => 'Had an awesome weekend taking photos in the snow!', 'user_id' => '1', 'image' => 'public/sC7kL9B63UJvFAjB9ypUqVgAwqoWAubzP0vvENat.jpeg'],
        // ['title' => '', 'text' => '', 'user_id' => '', 'image' => ''],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
