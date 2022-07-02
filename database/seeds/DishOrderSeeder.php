<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;
use App\Order;
//DB connection to insert data into the columns
use Illuminate\Support\Facades\DB;


class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $orders = Order::all();
        //$dishes = Dish::all();

        foreach ($orders as $order) {
            $orderDishes = Dish::where('user_id', rand(1,100))->inRandomOrder()->limit(rand(3, 7))->get();

            $order->dishes()->attach($orderDishes->pluck('id'), [
                'quantity' => rand(1, 10),
                'notes' => $faker->paragraph(),
            ]);
        }
        
        // update final_price
        for ($i=1; $i <= 1000 ; $i++) {
            
            $orderDishes = Order::find($i)->dishes()->get();
            $final_price = 0;
            foreach ($orderDishes as $dish) { 
                $final_price += $dish->price * $dish->pivot->quantity;
                DB::table('orders')->where('id', $i)->update(['final_price' => $final_price]);
            }
        }
    }
}
