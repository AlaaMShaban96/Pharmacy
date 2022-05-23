<?php

namespace Database\Factories;

use App\Models\ShipmentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShipmentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
        'drug_id' => $this->faker->word,
        'validity' => $this->faker->word,
        'playback_number' => $this->faker->word,
        'location' => $this->faker->word,
        'count' => $this->faker->word,
        'In_kind_inventory' => $this->faker->word,
        'samples' => $this->faker->randomDigitNotNull,
        'damaged' => $this->faker->randomDigitNotNull,
        'free' => $this->faker->randomDigitNotNull,
        'another' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
