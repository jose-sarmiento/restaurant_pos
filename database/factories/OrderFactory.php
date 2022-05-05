<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 50),
            'menu_id' => $this->faker->numberBetween(1, 29),
            'total_payment' => $this->faker->numberBetween(200, 1000),
            'payment_method' => $this->faker->randomElements(['paypal', 'cash'])[0],
            'qty' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElements(['completed', 'preparing', 'pending'])[0],
            'type' => $this->faker->randomElements(['dine in', 'to go', 'delivery'])[0]
        ];
    }
}
