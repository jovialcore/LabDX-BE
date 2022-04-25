<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique(true)->numberBetween(1, 14),
           'gender' => 'male',
            'profile_pic' => $this->faker->imageUrl( 640, 480, 'humans'),
            "about" =>$this->faker->text(100),
            "education_qualification"=> $this->faker->userName(),
            "specialization" => $this->faker->word(),
            "phone_number" => $this->faker->phoneNumber, 
            'hospital' =>  $this->faker->company,
           'dateofbirth' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'address' => $this->faker->streetAddress,
            'lga' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
        ];
    }
}
