<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

// Use this down below if you want to use Faker Restaurant
use FakerRestaurant\Provider\it_IT\Restaurant;

use App\User;
use App\Dish;


// Faker Details for $faker Restaurant

// $faker->foodName();      // A random Food Name
// $faker->dairyName();  // A random Dairy Name
// $faker->vegetableName();  // A random Vegetable Name
// $faker->fruitName();  // A random Fruit Name
// $faker->meatName();  // A random Meat Name
// $faker->sauceName();  // A random Sauce Name

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user, Faker $faker)
    {
        //Creation of the Seeder with Faker Restaurant + User Details
        $faker = \Faker\Factory::create('it_IT');
        $faker->addProvider(new Restaurant($faker));

        $users = User::all();
        
        // Loop 5 to 10 dishes for each Restaurant
        foreach ($users as $user) {
            
            //Loop Dishes
            for ($i=0; $i <= rand(7, 10); $i++) {
    
                $allergies = [
                    'Glutine',
                    'Crostacei e derivati',
                    'Uova e derivati',
                    'Pesce e derivati',
                    'Arachidi e derivati',
                    'Soia e derivati',
                    'Latte e derivati',
                    'Frutta a guscio e derivati',
                    'Sedano e derivati',
                    'Senape e derivati',
                    'Semi di sesamo e derivati',
                    'Lupino e derivati',
                    'Molluschi e derivati',
                ];
    
                // Array for Random ingredient
                $randomIngredient = [
                    "meat" => $faker->meatName(),
                    "fruit" => $faker->fruitName(),
                    "vegetable" => $faker->vegetableName(),
                    "sauce" => $faker->sauceName(),
                ];
    
                Dish::create([
                    'name'          => $faker->foodName(),
                    'description'   => $faker->paragraph(),
                    'ingredients'   => implode(', ', $faker->randomElements($randomIngredient, rand(2, 4))), 
                    'allergies'     => implode(', ', $faker->randomElements($allergies, rand(0, 5))),
                    'price'         => rand(30, 99)*10,
                    'user_id'       => $user->id,
                ]);
            }
        }
    }
}