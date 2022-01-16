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

        User::factory(2)->create();
        Topic::factory(3)->create();
        Post::factory(4)->create();

    }
}
