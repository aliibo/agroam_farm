@extends('layouts.tem')

@section('style')
@endsection

@section('content')

<div class="card mb-3 mb-md-4">

	<div class="card-body">
		<div class="mb-3 mb-md-4 d-flex justify-content-between">
			<div class="h3 mb-0">temperatures</div>
			<a href="" class="btn btn-primary">
				+
			</a>
		</div>


		<!-- Users -->
		<div class="table-responsive-xl">
			<table class="table text-nowrap mb-0">
				<thead>
				<tr>
                    {{-- @for ($i = 1; $i <= $temperatures->count(); $i++) --}}
                    @for ($i = 0; $i < $created->count(); $i++)
					    <th class="font-weight-semi-bold border-top-0 py-2">{{ $created[$i]->format('M-D H') }}h</th>

                    @endfor
				</tr>
				</thead>
				<tbody>
                    @for ($i = 0; $i < $temperatures->count(); $i++)
                        <td class="py-3">{{ $temperatures[$i] }} C°</td>
                    @endfor
				</tbody>
			</table>
						
		</div>
		<!-- End Users -->
	</div>
</div>

@endsection

@section('scripts')
@endsection