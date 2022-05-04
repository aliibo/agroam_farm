@extends('layouts.tem')
@section('content')


{{--1------------------------------------------------------------------------------------------------------------------- --}}

<div class="card mb-3 mb-md-4">

	<div class="card-body">
		<div class="mb-3 mb-md-4 d-flex justify-content-between">
			<div class="h3 mb-0">Utilisateurs</div>
			<a href="{{ route('Users.create') }}" class="btn btn-primary">
				Ajouter
			</a>
		</div>


		<!-- Users -->
		<div class="table-responsive-xl">
			<table class="table text-nowrap mb-0">
				<thead>
				<tr>
					<th class="font-weight-semi-bold border-top-0 py-2">Nom</th>
					<th class="font-weight-semi-bold border-top-0 py-2">E-mail</th>
					<th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
				</tr>
				</thead>
				<tbody>
				@forelse($users as $user)
				<tr>
					<td class="align-middle py-3">{{ $user->name }}</div>
					</td>
					<td class="py-3">{{ $user->email }}</td> 
					<td class="py-3">
						<div class="position-relative">
							<a class="link-dark d-inline-block" href="{{ route('Users.edit' , $user->id ),'/edit' }}">
								<i class="gd-pencil icon-text"></i>
							</a>
							@if($user->id != auth()->user()->id)
							<a class="link-dark d-inline-block" href="#" onclick="if(confirm('supprimer cet utilisateur ?')){document.getElementById('delete-entity-{{ $user->id }}').submit();return false;}">
								<i class="gd-trash icon-text"></i>
							</a>
							<form id="delete-entity-{{ $user->id }}" action="{{ route('Users.destroy' , $user->id ) }}" method="POST">
								<input type="hidden" name="_method" value="DELETE">
								@csrf
                				@method('DELETE')
							</form>
            
							@endif
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="5" class="align-center">
						<strong>No records found</strong><br>
					</td>
				</tr>
				@endforelse
				</tbody>
			</table>
			
			{{-- {{ $users->links('components.pagination') }} --}}
			
		</div>
		<!-- End Users -->
	</div>
</div>



	
		


{{--2------------------------------------------------------------------------------------------------------------------- --}}

{{-- <table class="table table-bordered table-sm">
  <thead>
   <tr>
       <th>No</th>
       <th>Name</th>
       <th>email</th>
       <th>Phone</th>
   <th>City</th>
       <th width="280px">Action</th>
   </tr>
  </thead>
  <tbody id="bodyData">

  </tbody>  
</table> --}}


@Endsection
@section('scripts')
{{-- <script>
  $(document).ready(function() {
      var url = "{{route('getUserData')}}";
      $.ajax({
          url: "{{route('getUserData')}}",
          type: "GET",
          data:{ 
              _token:'{{ csrf_token() }}'
          },
          cache: false,
          dataType: 'json',
          success: function(dataResult){
              console.log(dataResult);
              var resultData = dataResult.data;
              var bodyData = '';
              var i=1;
              $.each(resultData,function(index,row){
                  bodyData+="<tr>"
                  bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td>"+row.phone+"</td>"
                  +"<td>"+row.city+"</td><td><a class='btn btn-primary'>Edit</a>" 
                  +"<button class='btn btn-danger delete' value='"+row.id+"' style='margin-left:20px;'>Delete</button></td>";
                  bodyData+="</tr>";
                  
              })
              $("#bodyData").append(bodyData);
          }
      });
      
});
</script> --}}
@endsection