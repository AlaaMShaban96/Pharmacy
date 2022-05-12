<?php

namespace Database\Factories;

use App\Models\FinancialCovenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinancialCovenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinancialCovenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id' => $this->faker->word,
        'financial_covenant_type_id' => $this->faker->word,
        'number' => $this->faker->word,
        'amount' => $this->faker->word,
        'date' => $this->faker->word,
        'note' => $this->faker->word,
        'total' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
