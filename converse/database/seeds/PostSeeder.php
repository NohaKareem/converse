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
        ['title' => 'Nature Photography', 'text' => 'Currently learning about nature photogrpahy. Really like this photo and how the leaves make a beautiful rich green pattern.', 'user_id' => '2', 'image' => 'public/UGs2cQmfdkCXLYrwh80paNzJZ235vW5D6q2oGGO0.jpeg'],
        ['title' => 'On mindfulness', 'text' => 'Been trying to be more mindful lately. Time in nature is a great way to practice more mindfuleness.', 'user_id' => '1', 'image' => 'public/6VHs7w5Jec2CD6IZspUS19gj89zO5GEN32IDgLp5.jpeg'],
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
