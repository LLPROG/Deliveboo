<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Generator as Faker;
use Faker\Factory as Factory;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $faker = Factory::create('it_IT');

        
        for ($i=0; $i < 1000 ; $i++) {
    
            Order::create([
                'order_number'          => $faker->unique()->randomNumber(8, true),
                'customer_name'         => $faker->firstName(),
                'customer_surname'      => $faker->lastName(),
                'phone_number'          => $faker->phoneNumber(),
                'street'                => $faker->streetAddress(),
                'cap'                   => rand(20019, 20162),
                'city'                  => 'Milano',
                'status'                => $faker->boolean(),
                'final_price'           => 0,
                //'final_price'           => rand(100, 5000)*10, // Join -> confronto id_order e id_dish e
            ]);
        }
        
    }
}
