<?php


class PostsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('posts')->delete();

        $posts = array(
        	"I heard that you're settled down",
        	"That you found a girl and you're married now",
        	"I heard that your dreams came true",
        	"Guess she gave you things I didn't give to you",
        	"Old friend, why are you so shy?",
        	"Ain't like you to hold back",
        	"or hide from the light",
        	"I hate to turn up out of the blue uninvited",
        	"But I couldn't stay away, I couldn't fight it",
        	"I had hoped you'd see my face",
        	"And that you'd be reminded that for me"
        );

        $users = User::get()->toArray();
        for($i=1; $i<=20; $i++) {
        	$user = $users[mt_rand(0, sizeof($users)-1)];
            Post::create(array(
                'user_id' => $user['id'],
                'body' => $posts[mt_rand(0, sizeof($posts)-1)]
            ));
        }
	}

}