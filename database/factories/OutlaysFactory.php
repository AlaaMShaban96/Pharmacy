<?php

namespace Database\Factories;

use App\Models\Outlays;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutlaysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Outlays::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'financial_covenant_id' => $this->faker->word,
        'note' => $this->faker->word,
        'price' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
