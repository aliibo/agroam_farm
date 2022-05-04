<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Nfroid;
use App\Models\Data_meteo;
use App\Models\maxmin_temp;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class DataMeteoController extends Controller
{

// // Nfroid
//     public function Nfroid()
//     {
//         $year = 2022;
//         $month = 12;
//         // $year = date('Y', strtotime(Carbon::today()));
//         // $month = date('m', strtotime(Carbon::today()));
//         $start = Carbon::createFromFormat('Y-m-d', ($year) . '-10-01');
//         $end = Carbon::createFromFormat('Y-m-d', ($year+1) . '-04-30');
//         $max1 = 0; $min1 = 0; $indx = 0; $ma = 0; $mi = 0;$n = 0;

//         $month_array = array(10, 11, 12, 1, 2, 3, 4);

//         for ($i = 1; $i <= Carbon::now()->month($month)->daysInMonth; $i++) {
//             if (!in_array($month, $month_array)) {
//                 $n=0;
//             } else {
//                 $ma = maxmin_temp::whereYear('created_at', $year)
//                     ->whereMonth('created_at', $month)
//                     ->whereDay('created_at', $i)
//                     ->get()
//                     ->max('max_temp');
//                 $mi = maxmin_temp::whereYear('created_at', $year)
//                     ->whereMonth('created_at', $month)
//                     ->whereDay('created_at', $i)
//                     ->get()
//                     ->max('min_temp');

//                 $max1 += $ma;
//                 $min1 += $mi;

//                 if ($ma != 0 && $mi != 0) {
//                     ++$indx;
//                 }
//             }
//         }
        
//         $MaxAVG = $max1 / Carbon::now()->month($month)->daysInMonth;
//         $MinAVG = $min1 / Carbon::now()->month($month)->daysInMonth;
        
//         if ($indx == Carbon::now()->month($month)->daysInMonth) {
//             $n += ((7.2 - $MinAVG) /($MaxAVG - $MinAVG)) * 24 * 30;
//             $id = Nfroid::latest()->take(1)->pluck('id')->first();
        
//             if ($month == 10) {
//                 Nfroid::destroy($id);
//                 Nfroid::create(
//                     [
//                         'valuer' => $n, 
//                         'start' => $start,
//                         'fin' =>  $end,
//                         'month' =>  $month,
//                     ]);
//                 return 'Ok';
//             }

//             if ($id != null) {
//                 $data = Nfroid::findOrFail($id);
//                 $data->valuer =$n + $data->valuer;
//                 $data->start = $start;
//                 $data->fin = $end;
//                 $data->month = $month;
//                 $data->save();
//             } else {
//                 Nfroid::create(
//                 [
//                     'valuer' => $n, 
//                     'start' => $start,
//                     'fin' =>  $end,
//                     'month' =>  $month,
//                 ]);
//             }
//         }



        
//         dd('m');

//         dump('indx : '.$indx);
//         dump('n : '.$n);
//         dump('MaxAVG : '.$MaxAVG);
//         dump('MinAVG : '.$MinAVG);
//         dump('indx : '.$indx);
//         dump('min1 : '.$min1);
//         dd('max1 : '.$max1);
 
//         // }


//         // dd('out condition');


//         // $id = Nfroid::latest()->take(1)->pluck('id')->first();

//         // if ($id != null) {
//         //     $data = Nfroid::findOrFail($id);
//         //     $data->valuer =$n;
//         //     $data->start = $start;
//         //     $data->fin = $end;
//         //     $data->save();
//         // } else {
//         //     Nfroid::create(
//         //         [
//         //             'valuer' => $n, 
//         //             'start' => $start,
//         //             'fin' =>  $end,
//         //         ]
//         //     );
//         // }


//         // --------------------------------------------------------------------------
//         //         $year = date('Y', strtotime(Carbon::today()));

//         //         // $start = Carbon::createFromFormat('Y-m-d', ($year-1) . '-10-01');
//         //         // $end = Carbon::createFromFormat('Y-m-d', ($year) . '-04-30');
//         //         $start = Carbon::createFromFormat('Y-m-d', ($year) . '-10-01');
//         //         $end = Carbon::createFromFormat('Y-m-d', ($year+1) . '-04-30');
//         //         $check = Carbon::now()->between($start, $end);
//         //         // $darray =  (string)($year - 1);
//         //         $darray =  (string)($year + 1);

//         //         if (!$check) { 
//         //             $month_array = array(10, 11, 12, 1, 2, 3, 4);
//         //             // $year_array = array($darray, $darray, $darray, $year, $year, $year, $year);
//         //             $year_array = array($year, $year, $year, $darray, $darray, $darray, $darray);

//         //             for ($s = 0; $s < 7; $s++) {
//         //                 $max1 = 0;
//         //                 $min1 = 0;
//         //                 $indx = 0;
//         //                 $ma = 0;
//         //                 $mi = 0;
//         //                 for ($i = 1; $i <= Carbon::now()->month($month_array[$s])->daysInMonth; $i++) {
//         //                 // $max1 = 0;
//         //                 // $min1= 0;
//         //                     $ma = maxmin_temp::whereYear('created_at', $year_array[$s])
//         //                         ->whereMonth('created_at', $month_array[$s])
//         //                         ->whereDay('created_at', $i)
//         //                         ->get()
//         //                         ->max('max_temp');
//         //                     $mi = maxmin_temp::whereYear('created_at', $year_array[$s])
//         //                         ->whereMonth('created_at', $month_array[$s])
//         //                         ->whereDay('created_at', $i)
//         //                         ->get()
//         //                         ->max('min_temp');

//         //                     $max1 += $ma;
//         //                     $min1 += $mi;

//         //                     if ($ma == 0 && $mi == 0) {
//         //                         $ind[$s]= ++$indx;
//         //                     }else{
//         //                         $ind[$s]= 0;
//         //                     }
//         //                 }
//         //                 $minArr[$month_array[$s]] = $min1;
//         //                 $maxArr[$month_array[$s]] = $max1;
//         //             }

//         //             for ($s = 0; $s < 7; $s++) {
//         //                 $MaxAVG[$month_array[$s]] = ($maxArr[$month_array[$s]]) / Carbon::now()->month($month_array[$s])->daysInMonth;
//         //                 $MinAVG[$month_array[$s]] = ($minArr[$month_array[$s]]) / Carbon::now()->month($month_array[$s])->daysInMonth;
//         //             }

//         //             $n = 0;
//         //             for ($s = 0; $s < 7; $s++) {
//         //                 if ($ind[$s] == 0) {
//         //                     $n += ((7.2 - $MinAVG[$month_array[$s]]) /($MaxAVG[$month_array[$s]] - $MinAVG[$month_array[$s]])) * 24 * 30;
//         //                 } 
//         //             }


//         //             $id = Nfroid::latest()->take(1)->pluck('id')->first();

//         //             // dd($id);
//         //             if ($id != null) {
//         //                 $data = Nfroid::findOrFail($id);
//         //                 $data->valuer =$n;
//         //                 $data->start = $start;
//         //                 $data->fin = $end;
//         //                 $data->save();
//         //             } else {
//         //                 Nfroid::create(
//         //                     [
//         //                         'valuer' => $n, 
//         //                         'start' => $start,
//         //                         'fin' =>  $end,
//         //                     ]
//         //                 );
//         //             }
//         //         }

                
//         // delete array : unset($data);
//         // dump(gettype($newformat));
//     }
// // end Nfroid

    public function fc_month_days_avg($val)
    {
        $data = array();
        for ($i = 30; $i >= 0; $i--) {
            $d = Data_meteo::whereDate('created_at', Carbon::today()->subDays($i))->pluck($val)->avg();
            if ($d) {
                $data[] = $d;
            }
        }
        return $data;
    }

    public function data24($val)
    {
        // dd(Data_meteo::whereBetween('created_at', [Carbon::new()->subDays(1), Carbon::new()])->get()->avg('temperature'));
        $data = Data_meteo::whereBetween('created_at', [Carbon::now()->subDays(1), Carbon::now()])->get()->pluck($val);

        // $data = Data_meteo::latest()->take(24)->pluck($val);
        return $data;
    }

    // temperature -------------------------------------
    public function historique_temperature()
    {
        // $data =Data_meteo::whereBetween('created_at', [Carbon::today()->subDays(1), Carbon::today()])->get();
        // $data = Data_meteo::latest()->take(24)->pluck('created_at');
        // dd($data);

        // dd(Carbon::today());
        // $day_array = array();
        // $Temperature_dates = Data_meteo::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );

        // if ( ! empty( $Temperature_dates ) ) {
        // 	foreach ( $Temperature_dates as $unformatted_date ) {
        // 		$date = new \DateTime( $unformatted_date );
        // 		$day_no = $date->format( 'd-m-Y H' );
        // 		$day_array[] = $day_no;
        // 	}         
        //     $day_array = array_unique($day_array);
        //     $day_array = array_values($day_array);
        // }
        // // dd($day_array);

        // $to = Carbon::now()->format('d-m-Y H:i:s');
        // $from = Carbon::now()->subMinutes(1440)->format('d-m-Y H:i:s');

        // dd(Data_meteo::whereBetween('created_at', [$fr, $date])->get()->avg('temperature'));


        // // $date = new Carbon('2022-04-19 10:00:00');
        // $date = Carbon::now()->format('d-m-Y H:i:s');
        // // dd($date);
        // $data = array();
        // for ($i=30; $i>=1; $i--) { 
        //     $d = Data_meteo::whereDate('created_at', $date)->avg('temperature');
        //     if ($d) {
        //         $data[] = $d;
        //     }
        // }
        // dd($data);


        // dump($created_at);
        // dd($temperature);


        // ---------------------------------------------------------------------------------
        // $temperatures = $this->data24('temperature');
        // $humidites = $this->data24('humidite');
        // $vitesses = $this->data24('vitesse');
        // $pluies = $this->data24('pluie');
        // $directions = $this->data24('direction');
        // $created = $this->data24('created_at');

        $temperatures = array();
        $humidites = array();
        $vitesses = array();
        $pluies = array();
        $directions = array();
        $created = array();
        $month_days_temp_avg = array();
        $month_days_humidite_avg = array();
        $month_days_vitesse_avg = array();
        $month_days_pluie_avg = array();
        $month_days_direction_avg = array();
        $month_days_array = array();

        // dd(count($month_days_array));

        if (count(Data_meteo::all())) {
            if (!Cache::has('temperatures')) {
                $temperatures = $this->data24('temperature');
                // Cache::put('temperatures',$temperatures, 600);
            } else {
                $temperatures =  Cache::get('temperatures');
            }
            if (!Cache::has('humidites')) {
                $humidites = $this->data24('humidite');
                // Cache::put('humidites',$humidites, 600);
            } else {
                $humidites = Cache::get('humidites');
            }
            if (!Cache::has('vitesses')) {
                $vitesses = $this->data24('vitesse');
                // Cache::put('vitesses',$vitesses, 600);
            } else {
                $vitesses = Cache::get('vitesses');
            }
            if (!Cache::has('pluies')) {
                $pluies = $this->data24('pluie');
                // Cache::put('pluies',$pluies, 600);
            } else {
                $pluies = Cache::get('pluies');
            }
            if (!Cache::has('directions')) {
                $directions = $this->data24('direction');
                // Cache::put('directions',$directions,600);
            } else {
                $directions = Cache::get('directions');
            }
            if (!Cache::has('created')) {
                $created = $this->data24('created_at');
                // Cache::put('created',$created, 600);
            } else {
                $created = Cache::get('created');
            }
            // -----
            if (!Cache::has('month_days_temp_avg')) {
                $month_days_temp_avg = $this->fc_month_days_avg('temperature');
                // Cache::putMany($month_days_humidite_avg, 600);
            } else {
                $month_days_temp_avg = Cache::get('month_days_temp_avg');
            }
            if (!Cache::has('month_days_humidite_avg')) {
                $month_days_humidite_avg = $this->fc_month_days_avg('humidite');
                // Cache::putMany($month_days_humidite_avg, 600);
            } else {
                $month_days_humidite_avg = Cache::get('month_days_humidite_avg');
            }
            if (!Cache::has('month_days_vitesse_avg')) {
                $month_days_vitesse_avg = $this->fc_month_days_avg('vitesse');
                // Cache::putMany($month_days_vitesse_avg, 600);
            } else {
                $month_days_vitesse_avg = Cache::get('month_days_vitesse_avg');
            }
            if (!Cache::has('month_days_pluie_avg')) {
                $month_days_pluie_avg = $this->fc_month_days_avg('pluie');
                // Cache::putMany($month_days_pluie_avg, 600);
            } else {
                $month_days_pluie_avg = Cache::get('month_days_pluie_avg');
            }
            if (!Cache::has('month_days_direction_avg')) {
                $month_days_direction_avg = $this->fc_month_days_avg('direction');
                // Cache::putMany($month_days_direction_avg, 600);
            } else {
                $month_days_direction_avg = Cache::get('month_days_direction_avg');
            }

            $days = Data_meteo::whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::now()])->get()->pluck('created_at');
            foreach ($days as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $day_no = $date->format('d/m/Y');
                $month_days[] = $day_no;
            }

            $month_days = array_unique($month_days);
            $dates = array_values($month_days);
            foreach ($dates as $dateString) {
                $month_days_array[] = DateTime::createFromFormat('d/m/Y', $dateString)->format("m-d");
            }
        }

        return view('historique.temperature', compact(
            'temperatures',
            'humidites',
            'vitesses',
            'pluies',
            'directions',
            'created',
            'month_days_temp_avg',
            'month_days_humidite_avg',
            'month_days_vitesse_avg',
            'month_days_pluie_avg',
            'month_days_direction_avg',
            'month_days_array'
        ));

        // Cache::flush();
    }

    public function chart_temp()
    {
        // Data_meteo::create(['temperature' => rand(0,30),
        // 'humidite' => rand(0,100),
        // 'vitesse' => rand(0,80),
        // 'direction' => rand(0,360),
        // 'pluie' => rand(0,100),]);

        if (!Cache::has('data') && !Cache::has('labels')) {
            $Temperatures = Data_meteo::latest()->take(24)->get()->sortBy('id');
            $labels2 = $Temperatures->pluck('created_at');
            foreach ($labels2 as $date) {
                // Carbon\Carbon::parse(Carbon\Carbon::now()->addDays(1))->translatedFormat('d F')
                $labels[] =  Carbon::parse($date)->translatedFormat('D H\h');
                // $labels[] = date('l H', strtotime($date));                  
                // $labels[] = date('m-d h', strtotime($date));
            }
            $data = $Temperatures->pluck('temperature');
            Cache::put('data', $data, 600);
            Cache::put('labels', $labels, 600);
        } else {
            $data = Cache::get('data');
            $labels = Cache::get('labels');
        }

        


        return response()->json(compact('labels', 'data'));
    }
    // End temperature -------------------------------------

    // humidite -------------------------------------
    public function historique_humidite()
    {
        $temperatures = array();
        $humidites = array();
        $vitesses = array();
        $pluies = array();
        $directions = array();
        $created = array();
        $month_days_temp_avg = array();
        $month_days_humidite_avg = array();
        $month_days_vitesse_avg = array();
        $month_days_pluie_avg = array();
        $month_days_direction_avg = array();
        $month_days_array = array();

        if (count(Data_meteo::all())) {

            if (!Cache::has('temperatures')) {
                $temperatures = $this->data24('temperature');
                Cache::put('temperatures', $temperatures, 600);
            } else {
                $temperatures =  Cache::get('temperatures');
            }
            if (!Cache::has('humidites')) {
                $humidites = $this->data24('humidite');
                Cache::put('humidites', $humidites, 600);
            } else {
                $humidites = Cache::get('humidites');
            }
            if (!Cache::has('vitesses')) {
                $vitesses = $this->data24('vitesse');
                Cache::put('vitesses', $vitesses, 600);
            } else {
                $vitesses = Cache::get('vitesses');
            }
            if (!Cache::has('pluies')) {
                $pluies = $this->data24('pluie');
                Cache::put('pluies', $pluies, 600);
            } else {
                $pluies = Cache::get('pluies');
            }
            if (!Cache::has('directions')) {
                $directions = $this->data24('direction');
                Cache::put('directions', $directions, 600);
            } else {
                $directions = Cache::get('directions');
            }
            if (!Cache::has('created')) {
                $created = $this->data24('created_at');
                Cache::put('created', $created, 600);
            } else {
                $created = Cache::get('created');
            }

            if (!Cache::has('month_days_temp_avg')) {
                $month_days_temp_avg  = $this->fc_month_days_avg('temperature');
                Cache::putMany($month_days_temp_avg, 600);
            }
            if (!Cache::has('month_days_humidite_avg')) {
                $month_days_humidite_avg = $this->fc_month_days_avg('humidite');
                Cache::putMany($month_days_humidite_avg, 600);
            }
            if (!Cache::has('month_days_vitesse_avg')) {
                $month_days_vitesse_avg = $this->fc_month_days_avg('vitesse');
                Cache::putMany($month_days_vitesse_avg, 600);
            }
            if (!Cache::has('month_days_pluie_avg')) {
                $month_days_pluie_avg = $this->fc_month_days_avg('pluie');
                Cache::putMany($month_days_pluie_avg, 600);
            }
            if (!Cache::has('month_days_direction_avg')) {
                $month_days_direction_avg = $this->fc_month_days_avg('direction');
                Cache::putMany($month_days_direction_avg, 600);
            }

            $days = Data_meteo::whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::today()])->get()->pluck('created_at');
            foreach ($days as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $day_no = $date->format('d/m/Y');
                $month_days[] = $day_no;
            }

            $month_days = array_unique($month_days);
            $dates = array_values($month_days);

            foreach ($dates as $dateString) {
                $month_days_array[] = DateTime::createFromFormat('d/m/Y', $dateString)->format("m-d");
            }
        }

        return view('historique.humidite', compact('temperatures', 'humidites', 'vitesses', 'pluies', 'directions', 'created', 'month_days_temp_avg', 'month_days_humidite_avg', 'month_days_vitesse_avg', 'month_days_pluie_avg', 'month_days_direction_avg', 'month_days_array'));
    }

    public function chart_humidite()
    {
        if (!Cache::has('data') && !Cache::has('labels')) {
            $humidites = Data_meteo::latest()->take(24)->get()->sortBy('id');
            $labels2 = $humidites->pluck('created_at');
    
            foreach ($labels2 as $date) {
                $labels[] =  Carbon::parse($date)->translatedFormat('D H\h');
            }
            $data = $humidites->pluck('humidite');
            Cache::put('data', $data, 600);
            Cache::put('labels', $labels, 600);
        } else {
            $data = Cache::get('data');
            $labels = Cache::get('labels');
        }
        
        return response()->json(compact('labels', 'data'));
    }
    // End humidite -------------------------------------

    // Vitesse du vent -------------------------------------
    public function historique_Vitesse()
    {
        $temperatures = array();
        $humidites = array();
        $vitesses = array();
        $pluies = array();
        $directions = array();
        $created = array();
        $month_days_temp_avg = array();
        $month_days_humidite_avg = array();
        $month_days_vitesse_avg = array();
        $month_days_pluie_avg = array();
        $month_days_direction_avg = array();
        $month_days_array = array();

        if (count(Data_meteo::all())) {

            if (!Cache::has('temperatures')) {
                $temperatures = $this->data24('temperature');
                Cache::put('temperatures', $temperatures, 600);
            } else {
                $temperatures =  Cache::get('temperatures');
            }
            if (!Cache::has('humidites')) {
                $humidites = $this->data24('humidite');
                Cache::put('humidites', $humidites, 600);
            } else {
                $humidites = Cache::get('humidites');
            }
            if (!Cache::has('vitesses')) {
                $vitesses = $this->data24('vitesse');
                Cache::put('vitesses', $vitesses, 600);
            } else {
                $vitesses = Cache::get('vitesses');
            }
            if (!Cache::has('pluies')) {
                $pluies = $this->data24('pluie');
                Cache::put('pluies', $pluies, 600);
            } else {
                $pluies = Cache::get('pluies');
            }
            if (!Cache::has('directions')) {
                $directions = $this->data24('direction');
                Cache::put('directions', $directions, 600);
            } else {
                $directions = Cache::get('directions');
            }
            if (!Cache::has('created')) {
                $created = $this->data24('created_at');
                Cache::put('created', $created, 600);
            } else {
                $created = Cache::get('created');
            }

            if (!Cache::has('month_days_temp_avg')) {
                $month_days_temp_avg  = $this->fc_month_days_avg('temperature');
                Cache::putMany($month_days_temp_avg, 600);
            }
            if (!Cache::has('month_days_humidite_avg')) {
                $month_days_humidite_avg = $this->fc_month_days_avg('humidite');
                Cache::putMany($month_days_humidite_avg, 600);
            }
            if (!Cache::has('month_days_vitesse_avg')) {
                $month_days_vitesse_avg = $this->fc_month_days_avg('vitesse');
                Cache::putMany($month_days_vitesse_avg, 600);
            }
            if (!Cache::has('month_days_pluie_avg')) {
                $month_days_pluie_avg = $this->fc_month_days_avg('pluie');
                Cache::putMany($month_days_pluie_avg, 600);
            }
            if (!Cache::has('month_days_direction_avg')) {
                $month_days_direction_avg = $this->fc_month_days_avg('direction');
                Cache::putMany($month_days_direction_avg, 600);
            }

            $days = Data_meteo::whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::today()])->get()->pluck('created_at');
            foreach ($days as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $day_no = $date->format('d/m/Y');
                $month_days[] = $day_no;
            }

            $month_days = array_unique($month_days);
            $dates = array_values($month_days);

            foreach ($dates as $dateString) {
                $month_days_array[] = DateTime::createFromFormat('d/m/Y', $dateString)->format("m-d");
            }
        }

        return view('historique.vitesse', compact('temperatures', 'humidites', 'vitesses', 'pluies', 'directions', 'created', 'month_days_temp_avg', 'month_days_humidite_avg', 'month_days_vitesse_avg', 'month_days_pluie_avg', 'month_days_direction_avg', 'month_days_array'));
    }

    public function chart_Vitesse()
    {
        if (!Cache::has('data') && !Cache::has('labels')) {
            $vitesses = Data_meteo::latest()->take(24)->get()->sortBy('id');
            $labels2 = $vitesses->pluck('created_at');

            foreach ($labels2 as $date) {
                $labels[] =  Carbon::parse($date)->translatedFormat('D H\h');
            }

            $data = $vitesses->pluck('vitesse');
            Cache::put('data', $data, 600);
            Cache::put('labels', $labels, 600);
        } else {
            $data = Cache::get('data');
            $labels = Cache::get('labels');
        }

        

        return response()->json(compact('labels', 'data'));
    }
    // End Vitesse du vent -------------------------------------

    // pluie -------------------------------------
    public function historique_pluie()
    {
        $temperatures = array();
        $humidites = array();
        $vitesses = array();
        $pluies = array();
        $directions = array();
        $created = array();
        $month_days_temp_avg = array();
        $month_days_humidite_avg = array();
        $month_days_vitesse_avg = array();
        $month_days_pluie_avg = array();
        $month_days_direction_avg = array();
        $month_days_array = array();

        if (count(Data_meteo::all())) {

            if (!Cache::has('temperatures')) {
                $temperatures = $this->data24('temperature');
                Cache::put('temperatures', $temperatures, 600);
            } else {
                $temperatures =  Cache::get('temperatures');
            }
            if (!Cache::has('humidites')) {
                $humidites = $this->data24('humidite');
                Cache::put('humidites', $humidites, 600);
            } else {
                $humidites = Cache::get('humidites');
            }
            if (!Cache::has('vitesses')) {
                $vitesses = $this->data24('vitesse');
                Cache::put('vitesses', $vitesses, 600);
            } else {
                $vitesses = Cache::get('vitesses');
            }
            if (!Cache::has('pluies')) {
                $pluies = $this->data24('pluie');
                Cache::put('pluies', $pluies, 600);
            } else {
                $pluies = Cache::get('pluies');
            }
            if (!Cache::has('directions')) {
                $directions = $this->data24('direction');
                Cache::put('directions', $directions, 600);
            } else {
                $directions = Cache::get('directions');
            }
            if (!Cache::has('created')) {
                $created = $this->data24('created_at');
                Cache::put('created', $created, 600);
            } else {
                $created = Cache::get('created');
            }

            if (!Cache::has('month_days_temp_avg')) {
                $month_days_temp_avg  = $this->fc_month_days_avg('temperature');
                Cache::putMany($month_days_temp_avg, 600);
            }
            if (!Cache::has('month_days_humidite_avg')) {
                $month_days_humidite_avg = $this->fc_month_days_avg('humidite');
                Cache::putMany($month_days_humidite_avg, 600);
            }
            if (!Cache::has('month_days_vitesse_avg')) {
                $month_days_vitesse_avg = $this->fc_month_days_avg('vitesse');
                Cache::putMany($month_days_vitesse_avg, 600);
            }
            if (!Cache::has('month_days_pluie_avg')) {
                $month_days_pluie_avg = $this->fc_month_days_avg('pluie');
                Cache::putMany($month_days_pluie_avg, 600);
            }
            if (!Cache::has('month_days_direction_avg')) {
                $month_days_direction_avg = $this->fc_month_days_avg('direction');
                Cache::putMany($month_days_direction_avg, 600);
            }

            $days = Data_meteo::whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::today()])->get()->pluck('created_at');
            foreach ($days as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $day_no = $date->format('d/m/Y');
                $month_days[] = $day_no;
            }

            $month_days = array_unique($month_days);
            $dates = array_values($month_days);

            foreach ($dates as $dateString) {
                $month_days_array[] = DateTime::createFromFormat('d/m/Y', $dateString)->format("m-d");
            }
        }

        return view('historique.pluie', compact('temperatures', 'humidites', 'vitesses', 'pluies', 'directions', 'created', 'month_days_temp_avg', 'month_days_humidite_avg', 'month_days_vitesse_avg', 'month_days_pluie_avg', 'month_days_direction_avg', 'month_days_array'));
    }

    public function chart_pluie()
    {
        if (!Cache::has('data') && !Cache::has('labels')) {
            $pluies = Data_meteo::latest()->take(24)->get()->sortBy('id');
            $labels2 = $pluies->pluck('created_at');
            foreach ($labels2 as $date) {
                $labels[] =  Carbon::parse($date)->translatedFormat('D H\h');
            }
            $data = $pluies->pluck('pluie');   
            Cache::put('data', $data, 600);
            Cache::put('labels', $labels, 600);
        } else {
            $data = Cache::get('data');
            $labels = Cache::get('labels');
        }

        return response()->json(compact('labels', 'data'));
    }
    // End pluie -------------------------------------

    // direction du vent -------------------------------------
    public function historique_direction()
    {
        $temperatures = array();
        $humidites = array();
        $vitesses = array();
        $pluies = array();
        $directions = array();
        $created = array();
        $month_days_temp_avg = array();
        $month_days_humidite_avg = array();
        $month_days_vitesse_avg = array();
        $month_days_pluie_avg = array();
        $month_days_direction_avg = array();
        $month_days_array = array();

        if (count(Data_meteo::all())) {

            if (!Cache::has('temperatures')) {
                $temperatures = $this->data24('temperature');
                Cache::put('temperatures', $temperatures, 600);
            } else {
                $temperatures =  Cache::get('temperatures');
            }
            if (!Cache::has('humidites')) {
                $humidites = $this->data24('humidite');
                Cache::put('humidites', $humidites, 600);
            } else {
                $humidites = Cache::get('humidites');
            }
            if (!Cache::has('vitesses')) {
                $vitesses = $this->data24('vitesse');
                Cache::put('vitesses', $vitesses, 600);
            } else {
                $vitesses = Cache::get('vitesses');
            }
            if (!Cache::has('pluies')) {
                $pluies = $this->data24('pluie');
                Cache::put('pluies', $pluies, 600);
            } else {
                $pluies = Cache::get('pluies');
            }
            if (!Cache::has('directions')) {
                $directions = $this->data24('direction');
                Cache::put('directions', $directions, 600);
            } else {
                $directions = Cache::get('directions');
            }
            if (!Cache::has('created')) {
                $created = $this->data24('created_at');
                Cache::put('created', $created, 600);
            } else {
                $created = Cache::get('created');
            }

            if (!Cache::has('month_days_temp_avg')) {
                $month_days_temp_avg  = $this->fc_month_days_avg('temperature');
                Cache::putMany($month_days_temp_avg, 600);
            }
            if (!Cache::has('month_days_humidite_avg')) {
                $month_days_humidite_avg = $this->fc_month_days_avg('humidite');
                Cache::putMany($month_days_humidite_avg, 600);
            }
            if (!Cache::has('month_days_vitesse_avg')) {
                $month_days_vitesse_avg = $this->fc_month_days_avg('vitesse');
                Cache::putMany($month_days_vitesse_avg, 600);
            }
            if (!Cache::has('month_days_pluie_avg')) {
                $month_days_pluie_avg = $this->fc_month_days_avg('pluie');
                Cache::putMany($month_days_pluie_avg, 600);
            }
            if (!Cache::has('month_days_direction_avg')) {
                $month_days_direction_avg = $this->fc_month_days_avg('direction');
                Cache::putMany($month_days_direction_avg, 600);
            }

            $days = Data_meteo::whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::today()])->get()->pluck('created_at');
            foreach ($days as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $day_no = $date->format('d/m/Y');
                $month_days[] = $day_no;
            }

            $month_days = array_unique($month_days);
            $dates = array_values($month_days);

            foreach ($dates as $dateString) {
                $month_days_array[] = DateTime::createFromFormat('d/m/Y', $dateString)->format("m-d");
            }
        }

        return view('historique.direction', compact('temperatures', 'humidites', 'vitesses', 'pluies', 'directions', 'created', 'month_days_temp_avg', 'month_days_humidite_avg', 'month_days_vitesse_avg', 'month_days_pluie_avg', 'month_days_direction_avg', 'month_days_array'));
    }

    public function chart_direction()
    {
        if (!Cache::has('data') && !Cache::has('labels')) {
            $pluies = Data_meteo::latest()->take(24)->get()->sortBy('id');
            $labels2 = $pluies->pluck('created_at');

            foreach ($labels2 as $date) {
                $labels[] =  Carbon::parse($date)->translatedFormat('D H\h');
            }

            $data = $pluies->pluck('direction');
            
            Cache::put('data', $data, 600);
            Cache::put('labels', $labels, 600);
        } else {
            $data = Cache::get('data');
            $labels = Cache::get('labels');
        }
        
        return response()->json(compact('labels', 'data'));
    }
    // End direction du vent -------------------------------------



    // test
    public function test()
    {
        $day_avg_array = array();
        $Temperature_dates = Data_meteo::orderBy('created_at', 'ASC')->pluck('created_at');

        for ($i = 0; $i < 30; $i++) {
            $day_avg_array[] = Data_meteo::whereDate('created_at', Carbon::today()->subDays($i))->avg('temperature');
        }

        return response()->json(compact('day_avg_array'));



        // foreach ( $Temperature_dates as $unformatted_date ) {
        //     $date = new \DateTime( $unformatted_date );
        //     $day_no = $date->format( 'd' );
        //     $day_name = $date->format( 'D' );
        //     // $day_array[ $day_no] = $day_name;
        //     $day_avg_array[] = $day_no;
        // }


        // $items = array();
        // foreach($group_membership as $username) {
        //     $items[] = $username;
        // }

        // $avg = Data_meteo::whereDate('created_at', Carbon::today())->avg('temperature');
        // dd($avg);

    }
    //END test

    // getAllDays
    function getAllDays()
    {
        // month_array ---------------------------------------------

        // $month_array = array();
        // $Temperature_dates = Data_meteo::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );

        // if ( ! empty( $Temperature_dates ) ) {
        // 	foreach ( $Temperature_dates as $unformatted_date ) {
        // 		$date = new \DateTime( $unformatted_date );
        // 		$month_no = $date->format( 'm' );
        // 		$month_name = $date->format( 'M' );
        // 		$month_array[ $month_no ] = $month_name;
        // 	}
        // }
        // return $month_array;


        // day_array  ---------------------------------------------

        // $day_array = array();
        // $Temperature_dates = Data_meteo::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );

        // if ( ! empty( $Temperature_dates ) ) {
        // 	foreach ( $Temperature_dates as $unformatted_date ) {
        // 		$date = new \DateTime( $unformatted_date );
        // 		$day_no = $date->format( 'd' );
        // 		$day_name = $date->format( 'D' );
        // 		$day_array[ $day_no] = $day_name;
        // 	}            
        // }
        // return response()->json(compact('day_no'));

    }
    //END getAllDays

}
