<?php

namespace Database\Factories;

use App\Models\SampleReceived;
use Illuminate\Database\Eloquent\Factories\Factory;

class SampleReceivedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SampleReceived::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
        'company_id' => $this->faker->word,
        'validity' => $this->faker->word,
        'store_id' => $this->faker->word,
        'price' => $this->faker->randomDigitNotNull,
        'user_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
