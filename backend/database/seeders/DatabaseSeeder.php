<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Topic;
use App\Models\Post;
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

        User::factory()->create();
        Topic::factory()->create();
        Post::factory(6)->create();

    }
}
