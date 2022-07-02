<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;
use Faker\Generator as Faker;


class CategoryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {

            // Population of FK for Category and User in sync

            // $categoryUsers = Category::inRandomOrder()->limit(rand(0, 5))->get();
            $user->categories()->sync($faker->randomElements([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], rand(1, 3)));
        }
    }
}
