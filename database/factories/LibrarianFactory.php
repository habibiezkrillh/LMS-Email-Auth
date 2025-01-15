<?php

namespace Database\Factories;

use App\Models\Librarian;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class LibrarianFactory extends Factory
{
    protected $model = Librarian::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Default password for testing
            'admin_id' => \App\Models\Admin::factory(), // Automatically associate with an Admin
        ];
    }
}
