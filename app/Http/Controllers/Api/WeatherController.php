<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function Previsions()
    {
        return view('previsions');
    }
    public function __invoke()
    {
        // 'https://api.open-meteo.com/v1/forecast?latitude=33.441207&longitude=-5.222846&hourly=temperature_2m,windspeed_10m&daily=temperature_2m_max,temperature_2m_min,windspeed_10m_max,windgusts_10m_max&timezone=Europe%2FLondon'
        // dd('__invoke');


 
        $data = Http::get('https://api.open-meteo.com/v1/forecast?latitude=-6.85&longitude=-6.85&daily=temperature_2m_max,temperature_2m_min&timezone=UTC')->json();
        // dd($data['daily']['temperature_2m_min']);
        // dd($data['daily']);
        return view('previsions_test',['data'=>$data['daily']]);


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
    }
}
