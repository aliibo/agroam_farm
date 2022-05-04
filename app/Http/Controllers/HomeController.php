<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Nfroid;
use App\Models\Data_meteo;
use App\Models\maxmin_temp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        if (count(Data_meteo::latest()->take(1)->get())) {
            $Temp = Data_meteo::orderBy('created_at', 'desc')->first()->temperature;
            $humidite = Data_meteo::orderBy('created_at', 'desc')->first()->humidite;
            $vitesse = Data_meteo::orderBy('created_at', 'desc')->first()->vitesse;
            $direction = Data_meteo::orderBy('created_at', 'desc')->first()->direction;
            $pluie = Data_meteo::orderBy('created_at', 'desc')->first()->pluie;
        } else {
            $Temp = '-';
            $humidite = '-';
            $vitesse = '-';
            $direction = '-';
            $pluie = '-';
            $start = '-';
            $fin = '-';
        }

        if (count(Nfroid::latest()->take(1)->get())) {
            $n = Nfroid::orderBy('created_at', 'desc')->first()->valuer;
            $startval = Nfroid::orderBy('created_at', 'desc')->first()->start;
            $finval = Nfroid::orderBy('created_at', 'desc')->first()->fin;
            $start = DateTime::createFromFormat('Y-m-d', $startval)->format("m-Y");
            $fin = DateTime::createFromFormat('Y-m-d', $finval)->format("m-Y");
        } else {
            $start = '-';
            $fin = '-';
            $n = '-';
        }


        


        // dump("l'estimation du nombre d'heures de froid");
        // $year = date('Y', strtotime(Carbon::today()));
        // $date = date('d-m-Y H:i:s', strtotime(''.($year-1).'-04-19'));   
        // dd($date);

        // if (!Cache::has('n')) { 
        //     $month_array = array(10,11,12,1,2,3,4);
        //     $year_array = array(2021,2021,2021,2022,2022,2022,2022);
                
        //     for ($s=0 ; $s < 7 ; $s++) { 
        //         $max1=0;
        //         $min1=0;
        //         for ($i=1 ; $i <= Carbon::now()->month($month_array[$s])->daysInMonth; $i++) { 
        //             $max1 += maxmin_temp::whereYear('created_at', $year_array[$s])
        //                 ->whereMonth('created_at', $month_array[$s])
        //                 ->whereDay('created_at', $i)
        //                 ->get()
        //                 ->max('max_temp');
        //             $min1 += maxmin_temp::whereYear('created_at', $year_array[$s])
        //                 ->whereMonth('created_at', $month_array[$s])
        //                 ->whereDay('created_at', $i)
        //                 ->get()
        //                 ->max('min_temp');
        //         }
        //         $minArr[$month_array[$s]] = $min1;
        //         $maxArr[$month_array[$s]] = $max1;
        //     }
    
        //     for ($s=0 ; $s < 7 ; $s++) { 
        //         $MaxAVG[$month_array[$s]] = ($maxArr[$month_array[$s]]) / Carbon::now()->month($month_array[$s])->daysInMonth;
        //         $MinAVG[$month_array[$s]] = ($minArr[$month_array[$s]]) / Carbon::now()->month($month_array[$s])->daysInMonth;
        //     }
    
        //     $n=0;
        //     for ($s=0 ; $s < 7 ; $s++) { 
        //         $n += ((7.2-$MinAVG[$month_array[$s]])/($MaxAVG[$month_array[$s]]-$MinAVG[$month_array[$s]]))*24*30;
        //     }

        //     Cache::put('n',$n,600);
        // }else{
        //     $n = Cache::get('n');
        // }
        

        return view('home')->with(compact('Temp','humidite','vitesse','direction','pluie','n','start','fin'));
    }


    // get last temperateur val_temp
    public function last_val_temp()
    {        
        $Temperature = Data_meteo::orderBy('created_at', 'desc')->first()->temperature;
        return response()->json(compact('Temperature'));
    }
}
