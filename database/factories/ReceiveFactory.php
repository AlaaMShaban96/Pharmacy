<?php

namespace Database\Factories;

use App\Models\Receive;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receive::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'receive_date' => $this->faker->word,
        'inventory_date' => $this->faker->word,
        'company_id' => $this->faker->word,
        'company_code' => $this->faker->word,
        'shipment_number' => $this->faker->word,
        'invoice_number' => $this->faker->word,
        'packing_list_number' => $this->faker->word,
        'containers_number' => $this->faker->word,
        'pallet_number' => $this->faker->word,
        'shipment_type' => $this->faker->randomElement(]),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
