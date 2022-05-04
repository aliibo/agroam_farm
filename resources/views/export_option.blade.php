@extends('layouts.tem')

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
                <div class="h3 mb-0">Export option</div>
            </div>





            {{-- ----------------------------------------------------------- --}}
            <div class="row">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card mb-3 mb-md-4">
                        <div class="card-header border-bottom p-0">
                            <ul id="wallets" class="nav nav-v2 nav-primary nav-justified d-block d-xl-flex w-100"
                                role="tablist">
                                <li class="nav-item border-bottom border-xl-bottom-0">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4 active" href="#bitcoin"
                                        role="tab" aria-selected="true" data-toggle="tab">
                                        <span>Export Jour</span>
                                        <small class="text-muted ml-auto">(24 heures)</small>
                                    </a>
                                </li>
                                <li class="nav-item border-bottom border-xl-bottom-0 border-xl-left">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4" href="#bitcoinCash"
                                        role="tab" aria-selected="false" data-toggle="tab">
                                        <span>Export Mois</span>
                                        <small class="text-muted ml-auto">(=30 jour)</small>
                                    </a>
                                </li>
                                <li class="nav-item border-bottom border-xl-bottom-0 border-xl-left">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4" href="#etherium"
                                        role="tab" aria-selected="false" data-toggle="tab">
                                        <span>Export Anneé</span>
                                        <small class="text-muted ml-auto">(12 Mois)</small>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="walletsContent" class="card-body tab-content">
                            <div class="tab-pane fade show active" id="bitcoin" role="tabpanel">
                                {{-- Export Jour --}}

                                 <form action="{{ route('export_day') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Sélectionné un Jour</label>
                                      <div class="col-sm-10">
                                          <input type="date" class="form-control" id="day_to_export" name="day_to_export" required>
                                      </div>
                                  </div>                                      
                                      
                                  <table class="center">
                                  <div class="center">
                                      <div class="form-group row mb-0">
                                          <div class="col-md-6 offset-md-4">
                                              <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                                                  {{-- <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"></path> --}}
                                                  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                                                </svg> {{ __('Export Jour') }}
                                              </button>
                                          </div>
                                      </div>
                                    </div>
                                  </table>


                                     </form>
                                   
                                {{-- End Export Jour --}}
                            </div>

                            <div class="tab-pane fade" id="bitcoinCash" role="tabpanel">
                                 {{-- Export Mois --}}
                                 <form action="{{ route('export_month') }}" method="POST">
                                  @csrf
                                  <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Sélectionné un Mois</label>
                                      <div class="col-sm-10">
                                          <input type="month" class="form-control" id="month_to_export" name="month_to_export" required>
                                      </div>
                                  </div>

                                  <table class="center">
                                    <div class="center">
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                                                    {{-- <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"></path> --}}
                                                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                                                  </svg> {{ __('Export Mois') }}
                                                </button>
                                            </div>
                                        </div>
                                      </div>
                                    </table>
                              </form>
                              {{-- End Export Mois --}}
                            </div>

                            <div class="tab-pane fade" id="etherium" role="tabpanel">
                                 {{-- Export Anneé --}}
                                 <div class="center">
                                 @for ($i = 2021; $i <= date('Y'); $i++)
                                 <table class="center">
                                   <td>
                                    <form action="{{ route('export_year') }}" method="POST">
                                      @csrf
                                      <div >
                                            <input type="hidden" name="year" id="year" value={{$i }}>
                                            <button type="submit" class="btn btn-primary btnyear">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                                                {{-- <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"></path> --}}
                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                                              </svg>
                                               {{$i }} 
                                            </button>
                                      </div>
                                    </form>
                                   </td>
                                 </table>
                                  
                                 @endfor
                                </div>                  
                              {{-- End Export Anneé --}}
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>

            {{-- --------------------------------------------------------------------: --}}






            {{-- <div class="exp_btn"><a href="{{route('export_day')}}" class="btn btn-primary btn-block">dernier 24 heure</a></div> --}}
            {{-- <div class="exp_btn"><a href="{{route('export_week')}}" class="btn btn-primary btn-block">dernier Semaine</a></div> --}}
            {{-- <div class="exp_btn"><a href="{{route('export_month')}}" class="btn btn-primary btn-block">dernier Mois</a></div>
		<div class="exp_btn"><a href="{{route('export_year')}}" class="btn btn-primary btn-block">Cette Anneé</a></div> --}}

        </div>
    </div>

@endsection

@section('scripts')
    {{-- <script type="text/javascript">
  $(function () {
    $('#day_to_export').datetimepicker({locale:'fr'});
  });
</script> --}}
@endsection
