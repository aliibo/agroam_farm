<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <link href="{{ asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css') }}" rel="stylesheet"> --}}

    <!-- Template -->
    <link href="{{ asset('allchart/css/template.css') }}" rel="stylesheet" type="text/css">

    <!-- DEMO CHARTS -->
    {{-- <link href="{{ asset('allchart/demo/chartist.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('allchart/demo/chartist-plugin-tooltip.css') }}" rel="stylesheet" type="text/css" > --}}

    {{-- <style>
        #footer {
            position: fixed;
            bottom: 0px;
            height: 50px;
            /* right: 0px; */
            /* left: 0px; */
            margin-bottom: 0px;
        }
    </style> --}}
    @yield('style')
    <title>Document</title>
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="/">
                    <img class="img-fluid w-100" src="{{ asset('img/AGROAM_logo.png') }}" alt="AGROAM">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="/">
                    <img class="side-nav-show-on-closed" src="{{ asset('img/AGROAM_logo.png') }}" alt="AGROAM"
                        style="width: auto; height: 70px;">
                    <img class="side-nav-hide-on-closed" src="{{ asset('img/AGROAM_logo.png') }}" alt="AGROAM"
                        style="width: auto; height: 70px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>

            <div class="header-content col px-md-5">
                <div class="d-flex align-items-center">
                    <!-- Side Nav Toggle -->
                    <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose"
                        data-target="#sidebar" data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->

                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-2 ml-auto">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-target="#profileMenu" data-unfold-type="css-animation"
                            data-unfold-duration="300" data-unfold-animation-in="fadeIn"
                            data-unfold-animation-out="fadeOut">
                            <span class="mr-md-2 avatar-placeholder text-uppercase">
                                {{ substr(Auth::user()->name, 0, 1) }}</span>
                            <span class="d-none d-md-block">{{ Auth::user()->name }}</span>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu"
                            class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
                            aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            @if (Auth::user()->is_admin)
                                <li class="unfold-item">
                                    <a class="unfold-link d-flex align-items-center text-nowrap"
                                        href="{{ route('Users.index') }}">
                                        <span class="unfold-item-icon mr-3"><i
                                                class="gd-user"></i></span>Utilisateurs
                                    </a>
                                </li>
                            @endif

                            <li class="unfold-item unfold-item-has-divider">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="unfold-item-icon mr-3"><i class="gd-power-off"></i></span>
                                    {{ __('Se déconnecter') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- End User Avatar -->

                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="main">
        <!-- Sidebar Nav -->
        <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
                <!-- Title -->
                <li class="sidebar-heading h6">Menu</li>
                <!-- End Title -->

                <!-- Getting Started -->
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link media align-items-center" href="/">
                        <span class="side-nav-menu-icon d-flex mr-3"><i class="gd-home"></i></span>
                        <span class="side-nav-fadeout-on-closed media-body active">Aujourd'hui</span>
                    </a>
                </li>
                <!-- End Getting Started -->

                {{-- <!-- Vitesse de vent -->
            <li class="side-nav-menu-item">
                <a class="side-nav-menu-link media align-items-center" href="{{ route('historique_direction') }}">
                    <span class="side-nav-menu-icon d-flex mr-3"><i class="gd-home"></i></span>
                    <span class="side-nav-fadeout-on-closed media-body active">Vitesse de vent</span>
                </a>
            </li> --}}
                <!-- End Vitesse de vent -->

                <!-- Utils -->
                <li class="side-nav-menu-item side-nav-has-menu">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subUtils">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-layers-alt"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Historique</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Utils: subUtils -->
                    <ul id="subUtils" class="side-nav-menu side-nav-menu-second-level mb-0">
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link"
                                href="{{ route('historique_temperature') }}">Temperateur</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('historique_direction') }}">Direction de
                                vent</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('historique_vitesse') }}">Vitesse du
                                vent</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('historique_humidite') }}">Humidité</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('historique_pluie') }}">Pluie</a>
                        </li>
                    </ul>
                    <!-- End Utils: subUtils -->
                </li>
                <!-- End Utils -->

                <!-- Previsions -->
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('previsions') }}">
                        <span class="side-nav-menu-icon d-flex mr-3"><i class="gd-home"></i></span>
                        <span class="side-nav-fadeout-on-closed media-body active">Prévisions</span>
                    </a>
                </li>
                <!-- End Previsions -->


                <!-- Exporter -->
                {{-- <li class="side-nav-menu-item side-nav-has-menu">
                <a class="side-nav-menu-link media align-items-center" href="#"
                   data-target="#subExporter">
                  <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-cloud-down"></i>
                  </span>
                    <span class="side-nav-fadeout-on-closed media-body">Exporter</span>
                    <span class="side-nav-control-icon d-flex">
                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
              </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>

                <!-- Exporter: subExporter -->
                <ul id="subExporter" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="{{ route('export_day') }}">dernier 24 heure</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="{{ route('export_month') }}">dernier Mois</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="{{ route('export_year') }}">Cette Anneé</a>
                    </li>
                </ul>
                <!-- End Exporter: subExporter -->
            </li> --}}
                <!-- End Exporter -->



                {{-- --------------- --}}
                <li class="side-nav-menu-item side-nav-has-menu">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('to_view_export') }}">
                        <span class="side-nav-menu-icon d-flex mr-3"><i class="gd-cloud-down"></i></span>
                        <span class="side-nav-fadeout-on-closed media-body">Exporter</span>
                    </a>


                </li>
                {{-- ----------------------------- --}}
                <!-- Utils -->
                {{-- <li class="side-nav-menu-item side-nav-has-menu">
                <a class="side-nav-menu-link media align-items-center" href="#"
                   data-target="#subUtils1">
                  <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-cloud-down"></i>
                  </span>
                    <span class="side-nav-fadeout-on-closed media-body">Exporter</span>
                    <span class="side-nav-control-icon d-flex">
                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
              </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>

                <!-- Utils: subUtils1 -->
                <ul id="subUtils1" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item"><a class="side-nav-menu-link" href="">Jour</a></li>
                    <li class="side-nav-menu-item"><a class="side-nav-menu-link" href="">Semaine</a></li>
                    <li class="side-nav-menu-item"><a class="side-nav-menu-link" href="">Mois</a></li>
                    <li class="side-nav-menu-item"><a class="side-nav-menu-link" href="">Année</a></li>
                </ul>
                <!-- End Utils: subUtils1 -->
            </li> --}}
                <!-- End Utils -->

            </ul>
        </aside>
        <!-- End Sidebar Nav -->

        <div class="container">
            @include('Flash.MyFlash')

            @yield('content')

            <!-- Footer -->
            {{-- @include('components.footer') --}}
            <!-- End Footer -->
        </div>
    </main>

    <script src="{{ asset('allchart/js/template.js') }}"></script>
    <script src="{{ asset('allchart/js/template.vendor.js') }}"></script>



    @yield('scripts')
</body>

</html>
