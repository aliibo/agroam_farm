@extends('layouts.tem')
@section('style')
<link href="{{ asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="card shadow-0 border border-dark border-5 text-dark" style="border-radius: 10px;">
    <div class="card-body p-4">
        <div class="d-flex justify-content-around mt-3">
            <p class="small">Azrou</p>
            <p class="small">21.02.2021</p>
            <p class="small">Previsions</p>
        </div>
        <div class="d-flex justify-content-around align-items-center py-5 my-4">
            <p class="fw-bold mb-0" style="font-size: 5rem;">4°C</p>
            <div class="text-start">
                <p class="small">10:00</p>
                <p class="h3 mb-3">Sunday</p>
                <p class="small mb-0">Cloudy</p>
            </div>
        </div>
        <div class="card mb-3 mb-md-4">
            <div class="card-body">
                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">Previsions</div>
                </div>
                <div class="scrollme" style="overflow-x: auto">
                    <table class="table text-nowrap mb-0" style="width:100%">
                        <thead>
                            <th class="font-weight-semi-bold border-top-0 py-2">Date</th>
                            @foreach ($date as $item)
                                <th class="font-weight-semi-bold border-top-0 py-2" style="font-size: 14px">{{ $item }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            <Tr>
                                <td>Temperature Max</td>
                                @foreach ($temp_max as $temp_m)
                                    <td>{{ $temp_m }} C°</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td>Temperature Min</td>
                                @foreach ($temp_min as $temp_m)
                                    <td>{{ $temp_m }} C°</td>
                                @endforeach
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Pluie</td>
                                @for ($i = 6; $i >= 0; $i--)
                                    <td>{{ $i }} C°</td>
                                @endfor
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Humidite</td>
                                @for ($i = 6; $i >= 0; $i--)
                                    <td >{{ $i }} C°</td>
                                @endfor
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Vitesse</td>
                                @for ($i = 6; $i >= 0; $i--)
                                    <td>{{ $i }} C°</td>
                                @endfor
                            </Tr>
                            <Tr>
                                <td style="font-weight-semi-bold border-top-0 py-2">Direction</td>
                                @for ($i = 6; $i >= 0; $i--)
                                    <td>{{ $i }} C°</td>
                                @endfor
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