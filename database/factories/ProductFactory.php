<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb = 4, $asText = true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'regular_price' => $this->faker->numberBetween(100, 500),
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'SKU' => 'DIGI' . $this->faker->numberBetween(100, 200),
            'category_id' => $this->faker->numberBetween(1, 6),
            'quatity' => $this->faker->numberBetween(100, 200),
            'image' => 'digital_' . $this->faker->unique()->numberBetween(1, 22) . '.jpg',
            'stock_status' => 'instock',

        ];
    }
}
