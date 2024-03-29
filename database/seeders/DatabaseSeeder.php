<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\UrlShortener;
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
        $this->call(UsersSeeder::class);
        Post::factory(10)->create();
        UrlShortener::factory(10)->create();
        $this->call(IndexSeeder::class);
    }
}
