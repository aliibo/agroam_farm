<?php

namespace Database\Factories;

use DateTime;

// use Carbon\Carbon;
use App\Models\Temperature;
use Illuminate\Database\Eloquent\Factories\Factory;

// use Faker\Generator as faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Temperature>
 */
class TemperatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $Temp = Temperature::class;


    public function definition()
    {
        // $date = Carbon\Carbon::now();
        // 'date' => Carbon::createFromTimeStamp($faker->dateTimeBetween('now', '+7 days')->getTimestamp()),

        return [
            // 'temperature' => $this->faker->numberBetween(-1, 35),
            // 'created_at' => $this->faker->dateTimeBetween('-1 week', '+1 week')
        ];
    }
}
