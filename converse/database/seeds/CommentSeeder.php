<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
     /**
     * Sample comment records
     * @var array
     */
    private $comments = [
        ['commentText' => 'That sounds great!', 'user_id' => '1', 'post_id' => '1'],
        ['commentText' => 'Awesome!', 'user_id' => '1', 'post_id' => '2']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->comments as $comment) {
            Comment::firstOrCreate([
              'commentText' => $comment['commentText'],
              'user_id' => $comment['user_id'], 
              'post_id' => $comment['post_id']
            ]);
          }
    }
}