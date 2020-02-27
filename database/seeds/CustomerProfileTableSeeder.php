<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = ['male', 'female'];
        for ($i = 0; $i < 15; $i++) {
            DB::table('customer_profiles')->insert(
                [
                    'name' => $faker->name,
                    'phone_number' => $faker->e164PhoneNumber,
                    'address' => $faker->address,
                    'gender' => $gender[$faker->numberBetween(0,1)],
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]
            );
        }
    }
}
