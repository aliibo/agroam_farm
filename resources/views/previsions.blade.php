@extends('layouts.tem')
@section('style')
<link href="{{ asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="card shadow-0 border border-dark border-5 text-dark" style="border-radius: 10px;">
    <div class="card-body p-4">
        <div class="d-flex justify-content-around mt-3">
            <p class="small">Azrou,MA  </p>
            <p class="small">{{date('d-m-Y', strtotime(Carbon\Carbon::today()))}} </p>
            <p class="small">(5 jours)</p>
        </div>
        <div class="d-flex justify-content-around align-items-center py-5 my-4">
            <p class="fw-bold mb-0" style="font-size: 2rem;">Prévisions</p>
            <div class="text-start">
                <p class="small">{{ \Carbon\Carbon::parse(Carbon\Carbon::now())->translatedFormat('H\hi') }}</p>
                <p class="h3 mb-3">{{ \Carbon\Carbon::parse(Carbon\Carbon::now())->translatedFormat('D') }}</p>
                <p class="small mb-0">{{ \Carbon\Carbon::parse(Carbon\Carbon::now()->addDays(1))->translatedFormat('d F') }} à {{ \Carbon\Carbon::parse(Carbon\Carbon::now()->addDays(6))->translatedFormat('d F') }} </p>
            </div>
            {{-- d F Y à H\hi --}}
        </div>
        <div class="card mb-3 mb-md-4">
            <div class="card-body">
                {{-- <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">Prévisions</div>
                </div> --}}
                <div class="scrollme" style="overflow-x: auto">
                    <table class="table text-nowrap mb-0" style="width:100%">
                        <thead>
                            <th class="font-weight-semi-bold border-top-0 py-2">Date</th>
                            @foreach ($previsions as $prevision)
                                <th class="font-weight-semi-bold border-top-0 py-2" style="font-size: 14px">{{ $prevision->datetime }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            <Tr>
                                <td>Température  Max</td>
                                @foreach ($previsions as $prevision)
                                    <td>{{ $prevision->max_temp }} C°</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td>Température  Min</td>
                                @foreach ($previsions as $prevision)
                                    <td>{{ $prevision->low_temp }} C°</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td>humidity</td>
                                @foreach ($previsions as $prevision)
                                    <td>{{ $prevision->humidity }} %</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Direction</td>
                                @foreach ($previsions as $prevision)
                                    <td>
                                        <div class="icon icon-sm bg-soft-primary rounded-circle mr-2">
                                            @switch($prevision->wind_dir)
                                                    @case(360) <i class="gd-arrow-up icon-text d-inline-block text-primary mt-2 mb-3"></i>Nord @break
                                                    @case(90) <i class="gd-arrow-right icon-text d-inline-block text-primary mt-2 mb-3"></i>Est @break
                                                    @case(180) <i class="gd-arrow-down icon-text d-inline-block text-primary mt-2 mb-3"></i>Sud @break
                                                    @case(270) <i class="gd-arrow-left icon-text d-inline-block text-primary mt-2 mb-3"></i>Sud @break
                                                    @case( $prevision->wind_dir>0 && $prevision->wind_dir<90) <i class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i>Nord Est @break
                                                    @case( $prevision->wind_dir>90 && $prevision->wind_dir<180) <i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i>Sud Est @break
                                                    @case( $prevision->wind_dir>180 && $prevision->wind_dir<270) <i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i>Sud Ouest @break
                                                    @case( $prevision->wind_dir>270 && $prevision->wind_dir<360) <i class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i>Nord Ouest @break
                                                    @default
                                                        -
                                                @endswitch
                                        </div>                                        
                                    </td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Vitesse du vent</td>
                                @foreach ($previsions as $prevision)
                                    <td>{{ $prevision->wind_spd * 3,6 }} km/s</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Neiger</td>
                                @foreach ($previsions as $prevision)
                                    <td>{{ $prevision->snow }} mm</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Nuages</td>
                                @foreach ($previsions as $prevision)
                                    <td>{{ $prevision->clouds }} %</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2"></td>
                                @foreach ($previsions as $prevision)
                                <td><img src="https://www.weatherbit.io/static/img/icons/{{$prevision->icon}}.png" alt="" srcset="" height="30%" width="30%"> </td>
                                @endforeach
                            </Tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@endsection







































{{-- @extends('layouts.tem')

@section('style')
<style>
    .center {
      margin: auto;
      width: 70%;
      /* border: 1px solid red; */
    }
    .btnyear{
      width: 80%;
      margin: 10px;
    }
    @media screen and (max-width: 600px) {
      .center {
        text-align: center;
        margin: auto;
        width: 80%
      } 
    } 
</style>
@endsection

@section('content')
    <div class="card mb-3 mb-md-4">

        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Previsions</div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-3 mb-md-4">
                        Previsions
                        
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div id="container" class="calendar-container"></div>
@endsection

@section('scripts')
<script>
function weather() {
    return {
        city: '',
        weather: {},
        loading: false,
        error: '',

        getWeather() {
            this.error = ''
            this.weather = {}

            if (this.city === '') {
                return;
            }

            this.loading = true
            fetch('/api/weather')
                .then((res) => res.json())
                .then((res) => {
                    if (!res.temperature_2m_max) {
                        this.error = 'Error happened when fetching the API'
                    } else {
                        this.weather = res
                    }
                    this.loading = false
                })
        }
    }
}
</script>
@endsection --}}
