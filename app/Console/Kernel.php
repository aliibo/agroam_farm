<?php

namespace App\Console;

use App\Models\Nfroid;
use Illuminate\Support\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */


    protected $commands = [
        Commands\Nfroid::class
    ];


    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('calc_Nfroid')->everyMinute();
        $schedule->command('Nfroid:monthly')->lastDayOfMonth('23:30');
        // ->everyMinute();
        // ->lastDayOfMonth('23:00');
/* ------------------------------------------*/
        // $schedule->call(function () {           
        //     $year = rand(2000, 2022);
        //     $month = rand(1, 12);
        //     $day = rand(1, 28);

        //     $date = Carbon::create($year,$month ,$day , 0, 0, 0);

        //     Nfroid::create(
        //         [
        //             'valuer' => rand(600, 1500), 
        //             'start' => $date->format('Y-m-d'),
        //             'fin' =>  $date->addWeeks(rand(1, 52))->format('Y-m-d'),
        //         ]
        //     );
        // })->everyMinute();
/* ------------------------------------------*/
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
