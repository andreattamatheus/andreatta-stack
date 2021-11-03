<?php

namespace Database\Seeders;

use App\Models\Index;
use Illuminate\Database\Seeder;

class IndicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Index::factory()->create();
    }
}
