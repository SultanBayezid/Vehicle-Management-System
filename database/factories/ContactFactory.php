<?php

namespace Database\Factories;
use App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contact::class;
    public function definition()
    {
        return [
            'contact_name' => $this->faker->name,
            'company_name' => $this->faker->company,
            'contact_email' => $this->faker->unique()->safeEmail,
            'contact_phone' => $this->faker->phoneNumber,
            'country' => $this->faker->countryCode, // Use countryCode instead of country
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'address' => $this->faker->address,
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'linkedin' => $this->faker->url,
            'remarks' => $this->faker->sentence,
            'contact_image' => null, // You may adjust this according to your requirements
            'group_id' => null, // You may adjust this according to your requirements
            'user_id' => null, // You may adjust this according to your requirements
            'ref_user_id' => null, // You may adjust this according to your requirements
            'company_id' => 2, // You may adjust this according to your requirements
        ];
    }
}
