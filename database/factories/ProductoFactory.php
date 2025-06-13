<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cantidad = fake()->numberBetween(1, 100);
        $precio = fake()->numberBetween(1000, 100000);
        $total = $cantidad * $precio;

        return [
            'sku' => fake()->unique()->numberBetween(100000, 999999),
            'nombre' => fake()->words(3, true),
            'descripcion' => fake()->sentence(),
            'cantidad' => $cantidad,
            'precio' => $precio,
            'total' => $total
        ];
    }
}
