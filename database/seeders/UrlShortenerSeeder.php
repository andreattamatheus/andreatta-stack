<?php

namespace Database\Seeders;

use App\Models\UrlShortener;
use Illuminate\Database\Seeder;

class UrlShortenerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UrlShortener::factory()->create();
    }
}
