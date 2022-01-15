<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Topic;
use App\Models\Article;
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

        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $topic = Topic::factory()->create(['user_id' => $user->id]);
        $topic2 = Topic::factory()->create(['user_id' => $user2->id]);
        
        Article::factory()->create(['user_id' => $user->id, 'topic_id' => $topic2->id]);
        Article::factory()->create(['user_id' => $user2->id, 'topic_id' => $topic->id]);
        Article::factory()->create(['user_id' => $user->id, 'topic_id' => $topic->id]);
        Article::factory()->create(['user_id' => $user2->id, 'topic_id' => $topic2->id]);
    }
}
