<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as Factory;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // Localization for for Faker DON'T TOUCH
        $faker = Factory::create('it_IT');

        for ($i=0; $i < 100 ; $i++) { 
            $name = 'Ristorante da ' . $faker->unique()->firstName();
            User::create([
                'name'          => $name,
                'email'         => $faker->email(),

                /* Password Equal Generated for all users */
                'password'      => Hash::make('ciao'),

                'street'        => $faker->streetAddress(),
                'cap'           => rand(20019, 20162),
                'city'          => 'Milano',
                'phone_number'  => $faker->phoneNumber(),
                'p_iva'         => $faker->vat(),
                'slug'          => User::generateSlug($name),

                //How To Regex
                //'p_iva'       => $faker->unique()->regexify('IT[0-9]{11}'),
                //'p_iva'       => 'IT' . $faker->unique()->randomNumber(11, true);

                'day_off'       => $faker->numberBetween(0, 6),
                'closed'        => $faker->boolean(),
            ]);
        }
        
    }
}
