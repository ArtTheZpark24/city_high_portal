<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = FakerFactory::create();

        foreach (range(1, 50) as $index) { // Adjust the range as needed
            DB::table('students')->insert([
                'LRN' => $faker->unique()->numerify('##########'),
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'middlename' => $faker->lastName,
                'birthdate' => $faker->date,
                'gender' => $faker->randomElement(['male', 'female']),
                'address' => $faker->address,
                'contact' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'parent/guardian' => $faker->name,
                'parent/guardian-contact' => $faker->phoneNumber,
                'password' => bcrypt('password123'), // Use a default password or generate random ones
            ]);
        }
    }
}
