<?php

use Illuminate\Database\Seeder;

class ClientsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 65; $i++){
            DB::table('clients')->insert([
                [
                    'id' => $i,
                    'name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->freeEmail,
                    'dni' => rand(11111111,99999999),
                    'sexo' => $faker->randomElement(['masculino','femenino']),
                    'dob' => '1971-05-01',
                    'address' => $faker->address,
                    'prospecto' => $faker->boolean,
                    'phone1' => $faker->phoneNumber,
                    'nacionality' => 'Argentino',
                    'city' => 'CABA',
                    'province' => 'Buenos Aires',

                ]

            ]);
        }
    }
}
