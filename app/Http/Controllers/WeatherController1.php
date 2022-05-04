<?php

namespace App\Http\Controllers;

use App\Models\prevision;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherController1 extends Controller
{
    public function previsions()
    {
        $dateprev = prevision::latest()->take(1)->pluck('created_at')->first();

        if (!$dateprev || $dateprev->format( 'd-m-Y' ) != date('d-m-Y', strtotime(Carbon::today()))) {
            $data = Http::get('https://api.weatherbit.io/v2.0/forecast/daily?city=Azrou,MA&lat=33.441207&lon=-5.222846&key=2573470cdec244afb943e5f48a37b509')->json();
            prevision::truncate();
            if ($data) {
                $i=0;
                foreach ($data['data'] as $value) {
                    // prevision::truncate();
                    if ($i!=0 && $i<=6) {
                        $prevision = new prevision();
                        $prevision->max_temp = $value['max_temp'];
                        $prevision->low_temp = $value['low_temp'];
                        $prevision->clouds = $value['clouds'];
                        $prevision->icon = $value['weather']['icon'];
                        $prevision->wind_dir = $value['wind_dir'];
                        $prevision->humidity = $value['rh'];
                        $prevision->snow = $value['snow'];
                        $prevision->wind_spd = $value['wind_spd']; 
                        $prevision->datetime = $value['datetime'];
                        $prevision->save();
                    }
                    ++$i;               
                }
            }
        }

        
        // if (!Cache::has('previsions')) {
            $previsions = prevision::all();
        //     Cache::put('created',$previsions, 60);
        // } else {
        //     $previsions = Cache::get('previsions');
        // }

        return view('previsions', [
            'previsions' => $previsions
        ]);
    }
}



 
// $data = Http::get('https://api.open-meteo.com/v1/forecast?latitude=33.441207&longitude=-5.222846&daily=temperature_2m_max,temperature_2m_min&timezone=UTC')->json();


// if ($data) {
//     // dd($data);
//     return view('previsions_test',['date'=>$data['daily']['time'] ,
//      'temp_max'=>$data['daily']['temperature_2m_max'] ,
//      'temp_min'=>$data['daily']['temperature_2m_min'] ]);    
// } 



// $city = 'Azrou';
// $coordinates = config('app.city.'.$city);

// return Cache::remember('response' , 60 * 5, function() {
//     $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude=-6.85&longitude=-6.85&daily=temperature_2m_max,temperature_2m_min&timezone=UTC');
//     // $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude='.$coordinates['lat'].'&longitude='.$coordinates['lng'].'&daily=temperature_2m_max,temperature_2m_min&timezone=UTC');
//     // https://api.open-meteo.com/v1/forecast?latitude=-6.85&longitude=-6.85&daily=temperature_2m_max,temperature_2m_min&timezone=UTC
//     // dump($response);
//     if ($response->successful()) {
//         return $response->json('daily');
//     }

//     return response()->json([]);
// });