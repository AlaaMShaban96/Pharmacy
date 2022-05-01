<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'event_specialty_id' => $this->faker->word,
        'event_location_id' => $this->faker->word,
        'event_number' => $this->faker->word,
        'event_date' => $this->faker->word,
        'visitors_number' => $this->faker->word,
        'event_food_location' => $this->faker->word,
        'event_spicy_food_location' => $this->faker->word,
        'event_sweet_food_location' => $this->faker->word,
        'media_company_id' => $this->faker->word,
        'decoration_company_id' => $this->faker->word,
        'medical_representative' => $this->faker->word,
        'event_time' => $this->faker->word,
        'event_cost' => $this->faker->randomDigitNotNull,
        'user_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
