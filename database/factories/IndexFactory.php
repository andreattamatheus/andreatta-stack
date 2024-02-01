<?php

namespace Database\Factories;

use App\Models\Index;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndexFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Index::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Matheus Andreatta',
            'subtitle' => 'Desenvolvedor Web',
            'description' => 'Já trabalhei de tudo um pouco. Na maioria não deu certo,
                as que deram, são as minhas profissões hoje!',
        ];
    }
}
