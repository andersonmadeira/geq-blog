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

            $post->title = 'Post_'.str_random(40). "_$i";
            $post->content = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut lacus id metus varius convallis vel eu augue. Pellentesque sodales, arcu ut rhoncus eleifend, massa lectus auctor metus, a vehicula odio ante ac mi. In vel vehicula risus, eu tincidunt lectus. Praesent ornare rutrum quam, quis vehicula tellus mattis eget. Sed pellentesque imperdiet arcu, sed porttitor urna. Vivamus ac ligula nulla. Quisque blandit felis dolor, vel tincidunt urna iaculis ac. Cras laoreet nisi et leo aliquam, laoreet mattis neque pellentesque. Fusce tempor rutrum nibh, hendrerit lobortis sapien rutrum et. Quisque ligula nibh, mollis sed nunc sit amet, sodales suscipit urna. Phasellus lectus enim, fringilla ac metus vitae, blandit fringilla nisi. In congue ex at vehicula imperdiet.</p><p>Aliquam efficitur mattis turpis id fermentum. In hac habitasse platea dictumst. Nulla ultricies iaculis sapien non commodo. Duis aliquet, est a lacinia ullamcorper, velit lacus ullamcorper nisl, eu ullamcorper neque arcu ut est. Curabitur sed odio fermentum, volutpat nunc scelerisque, viverra neque. Sed massa libero, dignissim sed auctor vitae, auctor a justo. Duis eleifend libero eu leo sodales lobortis.</p>";
            $post->image = 'http://placekitten.com/1360/225';
            $post->user_id = $author_id;

            $post->save();
        }
    }
}
