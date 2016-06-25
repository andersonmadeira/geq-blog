<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [];
        $author_id = User::where('email', 'andersonmadeiracs@gmail.com')->first()->id;

        for($i = 0; $i < 50; $i++ ) {
            $post = new Post();

            $post->title = str_random(25);
            $post->content = file_get_contents('http://loripsum.net/api/10/short/headers');
            $post->image = 'http://placekitten.com/450/225';
            $post->user_id = $author_id;

            $post->save();
        }
    }
}
