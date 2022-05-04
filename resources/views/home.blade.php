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
</style>
@endsection

@section('content')

<div class="py-4 px-3 px-md-4">

<div class="mb-3 mb-md-4 d-flex justify-content-between"> 
    <div class="h3 mb-0">Statistique (temps réel)</div>
</div>

<script src="{{ asset('js/login.cdn.tailwindcss.com3.0.23.js') }}"></script> 
 
<!-- Statistics -->
{{-- <section class="u-clearfix u-image u-shading u-section-1" id="carousel_5a74">
    <div class="u-expanded-width u-gradient u-shape u-shape-rectangle u-shape-1"></div>
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
             
            <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-15 u-size-30-md u-white u-layout-cell-1">
              <div class="u-container-layout u-valign-middle u-container-layout-1">
                <span  class="u-icon u-icon-circle u-text-palette-1-base u-icon-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" height: "94px" width: "94px" class="bi bi-sun" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                  </svg>
                </span>
                <h1 class="u-text u-text-palette-1-base u-title u-text-1" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000">3487</h1>
                <p class="u-text u-text-2">Son</p>
              </div>
            </div>
            <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-15 u-size-30-md u-white u-layout-cell-1">
              <div class="u-container-layout u-valign-middle u-container-layout-1">
                <span  class="u-icon u-icon-circle u-text-palette-1-base u-icon-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" height: "94px" width: "94px" class="bi bi-sun" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                  </svg>
                </span>
                <h1 class="u-text u-text-palette-1-base u-title u-text-1" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000">3487</h1>
                <p class="u-text u-text-2">Son</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
</section> --}}


{{--    bg-secondary 
        bg-primary-darker
        bg-success
        bg-danger >
<div    bg-light "> --}}


  
<div class="row">

    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_temperature') }}';" style="cursor: pointer;" >
        <!-- temperature -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-primary rounded-circle mr-3">
                <i class="gd-shine icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1" id="temp"> {{$Temp}} C°</h4>
                <h6 class="mb-0">Temperature</h6>
            </div>
        </div>
        <!-- End temperature -->
    </div>

    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_humidite') }}';" style="cursor: pointer;" >
        <!-- humidite -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-success rounded-circle mr-3">
                <i class="gd-bar-chart icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$humidite}}%</h4>
            <h6 class="mb-0">Humidité</h6>
            </div>
        </div>
        <!-- End humidite -->
    </div>

    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_vitesse') }}';" style="cursor: pointer;" >
        <!-- vitesse -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-danger rounded-circle mr-3">
                <i class="gd-stats-up icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$vitesse}} km/h</h4>
                <h6 class="mb-0">Vitesse du vent</h6>
            </div>
        </div>
        <!-- End vitesse -->
    </div>

    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_direction') }}';" style="cursor: pointer;" >
        <!-- direction -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-dark rounded-circle mr-3">
                @switch($direction)
                        @case(360) <i class="gd-arrow-up icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case(90) <i class="gd-arrow-right icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case(180) <i class="gd-arrow-down icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case(270) <i class="gd-arrow-left icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case( $direction>0 && $direction<90) <i class="gd-arrow-top-right icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case( $direction>90 && $direction<180) <i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-white mt-2 mb-3"></i> @break
                        @case( $direction>180 && $direction<270) <i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-white mt-2 mb-3"></i> @break
                        @case( $direction>270 && $direction<360) <i class="gd-arrow-top-left icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @default
                            -
                    @endswitch
            </div>
            <div>
                <h4 class="lh-1 mb-1">
                    {{$direction}}°
                    @switch($direction)
                        @case(360) Nord @break
                        @case(90) Est @break
                        @case(180) Sud @break
                        @case(270) Ouest @break
                        @case( $direction>0 && $direction<90) Nord Est @break
                        @case( $direction>90 && $direction<180) Sud Est @break
                        @case( $direction>180 && $direction<270) Sud Ouest @break
                        @case( $direction>270 && $direction<360) Nord Ouest @break
                        @default
                            -
                    @endswitch
                </h4>
                <h6 class="mb-0"></h6>
            </div>
        </div>
        <!-- End direction -->
    </div>

    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_pluie') }}';" style="cursor: pointer;" >
        <!-- pluie -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-secondary rounded-circle mr-3">
                <i class="gd-cloud icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$pluie}} L/m³</h4>
                <h6 class="mb-0">Pluie</h6>
            </div>
        </div>
        <!-- End pluie -->
    </div>

    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <!-- Heure -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-primary-darker   rounded-circle mr-3">
                <i class="gd-time icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1"><div class="text-muted">Heures de froid :</div>{{Str::limit($n, 4, $end = '') }} @if($n != '-')H @endif  </h4>
                @if($n != '-')
                    <h6 class="mb-0"><Span style="font-size: 12px">de {{$start}} à {{$fin}} </Span></h6> 
                @endif
            </div>
        </div>
        <!-- End Heure -->
    </div>

    
    {{-- <div class="col-md-6 col-xl-3 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_temperature') }}';" style="cursor: pointer;" >
        <div class="card flex-row align-items-center p-2 p-md-4">
            <div class="icon icon-lg bg-primary rounded-circle mr-3">
                <i class="gd-shine icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1" id="temp"> {{$Temp}} C°</h4>
                <h6 class="mb-0">temperature</h6>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-6 col-xl-3 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_humidite') }}';" style="cursor: pointer;" >
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-success rounded-circle mr-3">
                <i class="gd-bar-chart icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$humidite}}%</h4>
                <h6 class="mb-0">humidité</h6>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-6 col-xl-3 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_vitesse') }}';" style="cursor: pointer;" >
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-danger rounded-circle mr-3">
                <i class="gd-stats-up icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$vitesse}} km/h</h4>
                <h6 class="mb-0">Vitesse du vent</h6>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-6 col-xl-3 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_direction') }}';" style="cursor: pointer;" >
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-dark rounded-circle mr-3">
                @switch($direction)
                        @case(360) <i class="gd-arrow-up icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case(90) <i class="gd-arrow-right icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case(180) <i class="gd-arrow-down icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case(270) <i class="gd-arrow-left icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case( $direction>0 && $direction<90) <i class="gd-arrow-top-right icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @case( $direction>90 && $direction<180) <i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-white mt-2 mb-3"></i> @break
                        @case( $direction>180 && $direction<270) <i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-white mt-2 mb-3"></i> @break
                        @case( $direction>270 && $direction<360) <i class="gd-arrow-top-left icon-text d-inline-block text-white mt-2 mb-3"></i>@break
                        @default
                            -
                    @endswitch
            </div>
            <div>
                <h4 class="lh-1 mb-1">
                    {{$direction}}°
                    @switch($direction)
                        @case(360) Nord @break
                        @case(90) Est @break
                        @case(180) Sud @break
                        @case(270) Ouest @break
                        @case( $direction>0 && $direction<90) Nord Est @break
                        @case( $direction>90 && $direction<180) Sud Est @break
                        @case( $direction>180 && $direction<270) Sud Ouest @break
                        @case( $direction>270 && $direction<360) Nord Ouest @break
                        @default
                            -
                    @endswitch
                </h4>
                <h6 class="mb-0"></h6>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-6 col-xl-3 mb-3 mb-xl-4" onclick="location.href='{{ route('historique_pluie') }}';" style="cursor: pointer;" >
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-warning rounded-circle mr-3">
                <i class="gd-cloud icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$pluie}} L/m³</h4>
                <h6 class="mb-0">pluie</h6>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-6 col-xl-3 mb-3 mb-xl-4" style="cursor: pointer;" >
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-primary-darker   rounded-circle mr-3">
                <i class="gd-time icon-text d-inline-block text-white"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{Str::limit($n, 4, $end = '') }} @if($n != '-')Heure @endif </h4>
                @if($n != '-')
                    <h6 class="mb-0"><Span style="font-size: 12px">{{$start}} a {{$fin}} </Span></h6> 
                @endif
            </div>
        </div>
    </div> --}}

</div>
<!-- End Statistics -->


{{-- <div class="row">
    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <div class="card-header">
                <h5 class="font-weight-semi-bold mb-0">Recent Orders</h5>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive-xl">
                    <table class="table text-nowrap mb-0">
                        <thead>
                        <tr>
                            <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Customer</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Phone</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Amount</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Status</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="py-3">149531</td>
                            <td class="py-3">
                                <div>John Doe</div>
                                <div class="text-muted">Acme Inc.</div>
                            </td>
                            <td class="py-3">(000) 111-1234</td>
                            <td class="py-3">$1,230.00</td>
                            <td class="py-3">
                                <span class="badge badge-pill badge-warning">Pending</span>
                            </td>
                            <td class="py-3">
                                <div class="position-relative">
                                    <a id="dropDown16Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown16" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown16" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                        <i class="gd-more-alt icon-text"></i>
                                    </a>

                                    <ul id="dropDown16" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown16Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                        <li class="unfold-item">
                                            <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                <span class="media-body">Edit</span>
                                            </a>
                                        </li>
                                        <li class="unfold-item">
                                            <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                <i class="gd-close unfold-item-icon mr-3"></i>
                                                <span class="media-body">Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
        



@endsection

@section('scripts')
@parent

<!-- DEMO CHARTS -->
{{-- <script src="{{ asset('allchart/demo/resizeSensor.js') }}" ></script>
<script src="{{ asset('allchart/demo/chartist.js') }}" ></script>
<script src="{{ asset('allchart/demo/chartist-plugin-tooltip.js') }}" ></script>
<script src="{{ asset('allchart/demo/gd.chartist-area.js') }}" ></script>
<script src="{{ asset('allchart/demo/gd.chartist-bar.js') }}" ></script>
<script src="{{ asset('allchart/demo/gd.chartist-donut.js') }}" ></script> --}}

{{-- <script>
    $.GDCore.components.GDChartistArea.init('.js-area-chart');
    $.GDCore.components.GDChartistBar.init('.js-bar-chart');
    $.GDCore.components.GDChartistDonut.init('.js-donut-chart');
</script> --}}




{{-- <script>
    function UPtemp()
    {
        $.ajax({
            url: "{{ route('chart_temp') }}",
            cache: false,
            success: function(html){
                $("#temp").html(html);
            }
        });
    }

    $(document).ready(function(){
        UPtemp();
        setInterval('UPtemp()',12000);
    });
</script> --}}
@endsection