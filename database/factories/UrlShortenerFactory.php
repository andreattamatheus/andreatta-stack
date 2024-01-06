<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\UrlShortener;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class UrlShortenerFactory extends Factory
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'url-shorteners';

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UrlShortener::class;


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'short_url' => $this->faker->url(),
            'clicks' => $this->faker->numberBetween(0, 100),
            'user_id' => 1
        ];
    }
}
