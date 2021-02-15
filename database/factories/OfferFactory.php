<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    protected $model = Offer::class;

    public function definition(): array
    {
        return [
            'name' => ucwords($this->faker->words(rand(2, 3), true)),
            'price' => rand(260000, 600000),
            'bedrooms' => rand(3, 5),
            'bathrooms' => rand(2, 3),
            'storeys' => rand(1, 2),
            'garages' => rand(1, 3),
        ];
    }
}
