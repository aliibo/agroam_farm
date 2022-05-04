@extends('layouts.tem')
@section('style')
    <style>
        #sudest {
            -webkit-transform: scaleY(-1);
            transform: scaleY(-1);
        }

        #sudouest {
            -webkit-transform: scaleY(-1);
            transform: scaleY(-1);
        }

        .myChart {
            width: 1000px;
            height: 200px;
            /* padding: 10px; */
            border-radius: 10px;
        }

        @media only screen and (max-width:700px) {
            .myChart {
                width: 900px;
                height: 450px;
            }
        }

    </style>
@endsection
@section('content')
{{-- myChart --}}
<div class="card mb-3 mb-md-4">
    <div class="scrollme" style="overflow-x:scroll">
        <div class="card">
            <div class="card-header">Historique de direction</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart-container" style="height:50vh; width:300mm">
                            <canvas class="myChart" id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
{{-- End myChart --}}

{{-- choice --}}
<div class="row">
    <div class="col-12">
        <!-- Card -->
        <div class="card mb-3 mb-md-4">
            <div class="card-header border-bottom p-0">
                <ul id="wallets" class="nav nav-v2 nav-primary nav-justified d-block d-xl-flex w-100" role="tablist">
                    <li class="nav-item border-bottom border-xl-bottom-0">
                        <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4 active" href="#day24" role="tab"
                            aria-selected="true" data-toggle="tab">
                            <span>aujourd'hui</span>
                            <small class="text-muted ml-auto">(dernier 24 heures)</small>
                        </a>
                    </li>
                    <li class="nav-item border-bottom border-xl-bottom-0 border-xl-left">
                        <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4" href="#month30" role="tab"
                            aria-selected="false" data-toggle="tab">
                            <span>dernier mois</span>
                            <small class="text-muted ml-auto">(chaque jour)</small>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="walletsContent" class="card-body tab-content">
                {{-- Table 1 --}}
                <div class="tab-pane fade show active" id="day24" role="tabpanel">
                    @include('components.day_data')
                    {{-- <div class="scrollme" style="overflow-x: auto">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                @php
                                    $cosp = 0;
                                    for ($i0 = $created->count() - 1; $i0 >= 0; $i0--) {
                                        if ($created[0]->format('D') != $created[$i0]->format('D')) {
                                            $cosp++;
                                        }
                                    }
                                @endphp
                                @for ($i = $created->count() - 1; $i >= 0; $i--)
                                    <th class="font-weight-semi-bold" style="font-size:16px;text-align:center;background-color: rgb(183, 194, 228)" colspan={{ $cosp }}>
                                        @if ($created[0]->format('D') != $created[$i]->format('D'))
                                            {{ $created[$i]->format('d-m-Y') }}
                                        @endif
                                        @break
                                    </th>
                                @endfor
                                @for ($i = 23 - $cosp; $i >= 0; $i--)
                                    <th class="font-weight-semi-bold"  style="font-size:16px;text-align:center;background-color: rgb(228, 197, 183)" colspan={{ 24 - $cosp }}>
                                        @if ($created[0]->format('D') == $created[$i]->format('D'))
                                            {{ $created[$i]->format('d-m-Y') }}
                                        @endif
                                        @break
                                    </th>
                                @endfor
                            </thead>
                            <thead>
                                @for ($i = $created->count() - 1; $i >= 0; $i--)
                                    <th class="font-weight-semi-bold" style="font-size: 14px">
                                        {{ $created[$i]->format('H') }}h</th>
                                @endfor
                            </thead>
                            <tbody>
                                <tr>
                                    @for ($i = $directions->count() - 1; $i >= 0; $i--)
                                        <td style="font-size: 12px"><span style="font-size: 12px;display: inline-block;white-space: nowrap;">
                                                {{ $directions[$i] }} °</span></td>
                                    @endfor
                                </tr>
                                <tr>
                                    @for ($i = $directions->count() - 1; $i >= 0; $i--)
                                        @switch ($directions[$i])
                                            @case(360) <td><i class="gd-arrow-up icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @case(90) <td><i class="gd-arrow-right icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @case(180) <td><i class="gd-arrow-down icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @case(270) <td><i class="gd-arrow-left icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @case($directions[$i] > 0 && $directions[$i] < 90) <td><i class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @case($directions[$i] > 90 && $directions[$i] < 180) <td><i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @case($directions[$i] > 180 && $directions[$i] < 270) <td><i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @case($directions[$i] > 270 && $directions[$i] < 360) <td><i class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                            @default    -
                                        @endswitch
                                    @endfor
                                </tr>
                                <tr>
                                    @for ($i = $directions->count() - 1; $i >= 0; $i--)
                                        <td style="font-size: 12px">
                                            @switch ($directions[$i])
                                                @case(360) Nord @break
                                                @case(90) Est @break
                                                @case(180) Sud @break
                                                @case(270) Ouest @break
                                                @case($directions[$i] > 0 && $directions[$i] < 90) Nord Est @break
                                                @case($directions[$i] > 90 && $directions[$i] < 180) Sud Est @break
                                                @case($directions[$i] > 180 && $directions[$i] < 270) Sud Ouest @break
                                                @case($directions[$i] > 270 && $directions[$i] < 360) Nord Ouest @break
                                                @default   -
                                            @endswitch
                                        </td>
                                    @endfor
                                </tr>
                                
                            </tbody>
                        </table>
                    </div> --}}
                    {{-- End Table 1 --}}
                    <br>
                    
                </div>

                <div class="tab-pane fade" id="month30" role="tabpanel">
                    @include('components.month_data')
                    {{-- <div class="scrollme" style="overflow-x: auto">
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                    @for ($i = 0; $i <= 29; $i++)
                                                        <th class="font-weight-semi-bold" style="font-size:15px;white-space: nowrap;text-align:center;background-color: rgba(198, 199, 198, 0.897)">
                                                            {{ $month_days_array[$i] }}
                                                        </th>
                                                    @endfor
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @for ($i = 0; $i <= 29; $i++)
                                                            <td style="font-size: 12px"><span style="font-size:13px;display:inline-block;white-space: nowrap">
                                                                {{ Str::limit($month_days_direction_avg[$i], 4, $end = '') }} °</span></td>
                                                        @endfor
                                                    </tr>
                                                    <tr>
                                                        @for ($i = count($month_days_direction_avg) - 1; $i >= 0; $i--)
                                                            @switch ($month_days_direction_avg[$i])
                                                                @case(360)
                                                                    <td><i class="gd-arrow-up icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                                                @case(90)
                                                                    <td><i class="gd-arrow-right icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                                                @case(180)
                                                                    <td><i class="gd-arrow-down icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                                                @case(270)
                                                                    <td><i class="gd-arrow-left icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                                                @case($month_days_direction_avg[$i] > 0 && $month_days_direction_avg[$i] < 90)
                                                                    <td><i class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                                                @case($month_days_direction_avg[$i] > 90 && $month_days_direction_avg[$i] < 180)
                                                                    <td><i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                                                @case($month_days_direction_avg[$i] > 180 && $month_days_direction_avg[$i] < 270)
                                                                    <td><i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                                                @case($month_days_direction_avg[$i] > 270 && $month_days_direction_avg[$i] < 360)
                                                                    <td><i class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i></td> @break
                                
                                                                @default
                                                                    -
                                                            @endswitch
                                                        @endfor
                                                    </tr>
                                                    <tr>
                                                        @for ($i = count($month_days_direction_avg) - 1; $i >= 0; $i--)
                                                            <td style="font-size: 12px">
                                                                @switch ($month_days_direction_avg[$i])
                                                                    @case(360) Nord @break
                                                                    @case(90) Est @break
                                                                    @case(180) Sud @break
                                                                    @case(270) Ouest @break
                                                                    @case($month_days_direction_avg[$i] > 0 && $month_days_direction_avg[$i] < 90) Nord Est @break
                                                                    @case($month_days_direction_avg[$i] > 90 && $month_days_direction_avg[$i] < 180) Sud Est @break
                                                                    @case($month_days_direction_avg[$i] > 180 && $month_days_direction_avg[$i] < 270) Sud Ouest @break
                                                                    @case($month_days_direction_avg[$i] > 270 && $month_days_direction_avg[$i] < 360) Nord Ouest @break
                                                                    @default   -
                                                                @endswitch
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    </div> --}}
{{-- End choice --}}

@endsection

@section('scripts')
@parent
{{-- chart js --}}
<script src="{{ asset('js/liveChart.min.js') }}"></script>

<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'direction en °',
                data: [],
                borderWidth: 1,
                borderColor: 'rgb(0, 108, 191)',
            }]
        },
        options: {
            // responsive: false,
            maintainAspectRatio: false,
            scales: {
                xAxes: [],
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            }
        }
    });
    var updateChart = function() {
        $.ajax({
            url: "{{ route('chart_direction') }}",
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                myChart.data.labels = data.labels;
                myChart.data.datasets[0].data = data.data;
                myChart.update();
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    updateChart();
    setInterval(() => {
        updateChart();
    }, 60000);
</script>
{{-- endc chart js --}}
@endsection
