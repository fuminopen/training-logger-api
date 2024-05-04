<?php

namespace Database\Factories;

use App\Models\BodyPart;
use Illuminate\Database\Eloquent\Factories\Factory;

class BodyPartFactory extends Factory
{
    protected $model = BodyPart::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
