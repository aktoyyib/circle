<?php

namespace Database\Factories;

use App\Models\BloodPressureObservation;
use App\Models\Patients;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodPressureObservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodPressureObservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  
        $observation = $this->faker->randomElement(['High', 'Low', 'Medium'])[0];

        return [
            'patient_id' => Patients::factory()->create()->id,
            'observation' => $observation,
        ];
    }
}
