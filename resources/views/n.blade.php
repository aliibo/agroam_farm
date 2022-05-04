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
                <div class="h3 mb-0">{{$n}}</div>
            </div>

        </div>
    </div>

@endsection


