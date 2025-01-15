<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionFactory extends Factory
{
    protected $model = Collection::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['book', 'journal', 'newspaper', 'cd/dvd']),
            'is_physical' => $this->faker->boolean,
            'librarian_id' => \App\Models\Librarian::factory(), // Automatically associate with a Librarian
        ];
    }
}
