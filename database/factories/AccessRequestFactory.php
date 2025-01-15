<?php

namespace Database\Factories;

use App\Models\AccessRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessRequestFactory extends Factory
{
    protected $model = AccessRequest::class;

    public function definition()
    {
        return [
            'collection_id' => \App\Models\Collection::factory(), // Automatically associate with a Collection
            'user_id' => \App\Models\User::factory(), // Associate with a User (create a UserFactory if necessary)
            'librarian_id' => \App\Models\Librarian::factory(), // Automatically associate with a Librarian
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
