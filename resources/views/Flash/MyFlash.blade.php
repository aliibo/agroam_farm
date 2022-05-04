<div class="container">
<div class="table-responsive">
<div class="table-wrapper">

@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert" style="text-align: center;">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('danger'))
<br>
<br>
<div class="alert alert-danger" role="alert" style="text-align: center;">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('warning'))
<br>
<br>
<div class="alert alert-warning" role="alert" style="text-align: center;">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('info'))
<br>
<br>
<div class="alert alert-info" role="alert" style="text-align: center;">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('primary'))
<br>
<br>
<div class="alert alert-primary" role="alert" style="text-align: center;">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        {{ $message }}
    </div>
@endif

{{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert" style="text-align: center;">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        {{ $message }}
    </div>
@endif --}}

</div>
</div>
</div>