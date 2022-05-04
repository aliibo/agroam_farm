<?php

namespace App\Console\Commands;

use App\Models\maxmin_temp;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class Nfroid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'old calc_Nfroid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'old calculate N froid';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $year = 2022;
        // $month = 10;
        // // $year = date('Y', strtotime(Carbon::today()));
        // // $month = date('m', strtotime(Carbon::today()));
        // $start = Carbon::createFromFormat('Y-m-d', ($year) . '-10-01');
        // $end = Carbon::createFromFormat('Y-m-d', ($year+1) . '-04-30');
        // $max1 = 0; $min1 = 0; $indx = 0; $ma = 0; $mi = 0;$n = 0;

        // $month_array = array(10, 11, 12, 1, 2, 3, 4);

        // for ($i = 1; $i <= Carbon::now()->month($month)->daysInMonth; $i++) {
        //     if (!in_array($month, $month_array)) {
        //         $n=0;
        //     } else {
        //         $ma = maxmin_temp::whereYear('created_at', $year)
        //             ->whereMonth('created_at', $month)
        //             ->whereDay('created_at', $i)
        //             ->get()
        //             ->max('max_temp');
        //         $mi = maxmin_temp::whereYear('created_at', $year)
        //             ->whereMonth('created_at', $month)
        //             ->whereDay('created_at', $i)
        //             ->get()
        //             ->max('min_temp');

        //         $max1 += $ma;
        //         $min1 += $mi;

        //         if ($ma != 0 && $mi != 0) {
        //             ++$indx;
        //         }
        //     }
        // }
        
        // $MaxAVG = $max1 / Carbon::now()->month($month)->daysInMonth;
        // $MinAVG = $min1 / Carbon::now()->month($month)->daysInMonth;
        
        // if ($indx == Carbon::now()->month($month)->daysInMonth) {
        //     $n += ((7.2 - $MinAVG) /($MaxAVG - $MinAVG)) * 24 * 30;
        //     $id = Nfroid::latest()->take(1)->pluck('id')->first();
        
        //     if ($month == 10) {
        //         Nfroid::destroy($id);
        //         Nfroid::create(
        //             [
        //                 'valuer' => $n, 
        //                 'start' => $start,
        //                 'fin' =>  $end,
        //                 'month' =>  $month,
        //             ]);
        //         return 'Ok';
        //     }

        //     if ($id != null) {
        //         $data = Nfroid::findOrFail($id);
        //         $data->valuer =$n + $data->valuer;
        //         $data->start = $start;
        //         $data->fin = $end;
        //         $data->month = $month;
        //         $data->save();
        //     } else {
        //         Nfroid::create(
        //         [
        //             'valuer' => $n, 
        //             'start' => $start,
        //             'fin' =>  $end,
        //             'month' =>  $month,
        //         ]);
        //     }
        // }


        // \Log::info("Cron is working fine!");

        // User::create(
        //     [
        //         'name' => Str::random(7), 
        //         'email' => Str::random(7).'@gmail',
        //         'password' => bcrypt('12345678'),
        //     ]
        // );

        // $year = rand(2000, 2022);
        // $month = rand(1, 12);
        // $day = rand(1, 28);

        // $date = Carbon::create($year,$month ,$day , 0, 0, 0);

        // Nfroid::create(
        //     [
        //         'valuer' => rand(600, 1500), 
        //         'start' => $date->format('Y-m-d'),
        //         'fin' =>  $date->addWeeks(rand(1, 52))->format('Y-m-d'),
        //     ]
        // );
        // $this->info('create successfully');
    
        // User::findOrFail(3)->delete();

        // return 0;
    }
}
