<?php

use App\OpeningTime;
use Illuminate\Database\Seeder;
use App\User;

class OpeningTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $users = User::all();
        foreach ($users as $user) {
            $y = 0;
            while ($y <= 6) {
                if ($user->day_off !== $y) {
                    OpeningTime::create([
                        'user_id'        => $user->id,
                        'week_day'       => $y,
                        'opening_time'   => '11:00:00',
                        'closing_time'   => '23:00:00',
                    ]);
                } 
                $y++;
            }
        };
    }   
}