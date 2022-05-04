<?php

namespace Database\Seeders;

use App\Models\Data_meteo;
use App\Models\maxmin_temp;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // // craete Users
        // (User::where('email','aliiboone999@gmail.com')->first()) ? : $user = User::create(
        //     [
        //         'name' => 'Ali', 
        //         'email' => 'aliiboone999@gmail.com',
        //         'password' => bcrypt('12345678'),
        //         'is_admin' => 1,
        //     ]
        // );

        // (User::where('email','test@test')->first()) ? : $user = User::create(
        //     [
        //         'name' => 'test', 
        //         'email' => 'test@test',
        //         'password' => bcrypt('12345678'),
        //     ]
        // );

        // // Data_meteo
        // for ($i=1; $i < 10000; $i++) { 
        //     // $new = Carbon::now()->subHours(100);
        //     $new = new Carbon('2021-09-12');

        //     // $new = Carbon::now()->subMinutes();
            
        //     $Data_meteo = new Data_meteo();
        //     $Data_meteo->temperature = rand(1.20,30.00);
        //     $Data_meteo->humidite = rand(1,100);
        //     $Data_meteo->vitesse = rand(1,80);
        //     $Data_meteo->direction = rand(1,360);
        //     $Data_meteo->pluie = rand(0,100);
        //     $Data_meteo->created_at = $new->addHours($i);
        //     // $c = $i *10;
        //     // $Data_meteo->created_at = $new->addMinutes($c);
        //     $Data_meteo->save();
        // }
        // // End Data_meteo

        // // maxmin_temp
        // for ($i=0; $i < 500; $i++) { 
        //     $new = new Carbon('2021-10-01');
        //     $maxmin_temp = new maxmin_temp();
            
        //     $max =rand(10.00,30.00);
        //     $min =rand(1.00,6.00);
            
        //     $maxmin_temp->max_temp = $max;
        //     $maxmin_temp->min_temp = $min;
        //     $maxmin_temp->created_at = $new->addDays($i);
        //     $maxmin_temp->save();
        // }
        // // END maxmin_temp


    }
}
