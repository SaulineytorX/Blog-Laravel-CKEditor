<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word(20); //Con esto decimos que el name sea unico y se almacena en una variable para poder usarla 2 veces
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),

        ];
    }
}
