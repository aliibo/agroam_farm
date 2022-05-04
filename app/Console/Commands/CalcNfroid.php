<?php

namespace App\Console\Commands;

use App\Models\Nfroid;
use App\Models\maxmin_temp;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class CalcNfroid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Nfroid:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calculate Nfroid monthly';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $year = 2022;
        // $month = 10;
        $year = date('Y', strtotime(Carbon::today()));
        $month = date('m', strtotime(Carbon::today()));
        $start = Carbon::createFromFormat('Y-m-d', ($year) . '-10-01');
        $end = Carbon::createFromFormat('Y-m-d', ($year+1) . '-04-30');
        $max1 = 0; $min1 = 0; $indx = 0; $ma = 0; $mi = 0;$n = 0;

        $month_array = array(10, 11, 12, 1, 2, 3, 4);
        $first_months = array(1, 2, 3, 4);

        if (in_array($month, $first_months)) {
            $start = Carbon::createFromFormat('Y-m-d', ($year-1) . '-10-01');
            $end = Carbon::createFromFormat('Y-m-d', ($year) . '-04-30');
        }
        
        for ($i = 1; $i <= Carbon::now()->month($month)->daysInMonth; $i++) {
            if (!in_array($month, $month_array)) {
                $n=0;
            } else {
                $ma = maxmin_temp::whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->whereDay('created_at', $i)
                    ->get()
                    ->max('max_temp');
                $mi = maxmin_temp::whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->whereDay('created_at', $i)
                    ->get()
                    ->max('min_temp');

                $max1 += $ma;
                $min1 += $mi;

                if ($ma != 0 && $mi != 0) {
                    ++$indx;
                }
            }
        }
        
        $MaxAVG = $max1 / Carbon::now()->month($month)->daysInMonth;
        $MinAVG = $min1 / Carbon::now()->month($month)->daysInMonth;
        
        if ($indx == Carbon::now()->month($month)->daysInMonth) {
            $n += ((7.2 - $MinAVG) /($MaxAVG - $MinAVG)) * 24 * 30;
            $id = Nfroid::latest()->take(1)->pluck('id')->first();

            if ($id == null) {
                $Nfroid = new Nfroid();
                $Nfroid->valuer = $n;
                $Nfroid->start = $start;
                $Nfroid->fin = $end;
                $Nfroid->month = $month;
                $Nfroid->save();
            } else {
                if ($month == 10) {
                    // Nfroid::destroy($id);
                    // Nfroid::truncate();
                    $Nfroid = new Nfroid();
                    $Nfroid->valuer = $n;
                    $Nfroid->start = $start;
                    $Nfroid->fin = $end;
                    $Nfroid->month = $month;
                    $Nfroid->save();
                }else {          
                    $data = Nfroid::findOrFail($id);
                    // $data->valuer =$n + $data->valuer;
                    // $data->start = $start;
                    // $data->fin = $end;
                    // $data->month = $month;
                    // $data->save();

                    $Nfroid = new Nfroid();
                    $Nfroid->valuer = $n  + $data->valuer;
                    $Nfroid->start = $start;
                    $Nfroid->fin = $end;
                    $Nfroid->month = $month;
                    $Nfroid->save();
                }
            }
        }

    }
}
