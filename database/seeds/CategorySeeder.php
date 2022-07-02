<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Limit to 10 Categories

        $categories = [
            'Internazionale',
            'Etnico',
            'Filippino',
            'Italiano',
            'Giapponese',
            'Messicano',
            'Indiano',
            'Cinese',
            'Pizza',
            'Burger',
        ];

        //Loop for Category Creation
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}