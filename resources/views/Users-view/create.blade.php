@extends('layouts.tem')
@section('content')
    {{-- 1------------------------------------------------------------------------------------------------------------------- --}}

<div class="card mb-3 mb-md-4">

	<div class="card-body">
    <div class="mb-3 mb-md-4 d-flex justify-content-between">
       <div class="h3 mb-0">Ajouter utilisateur</div>
    </div>
        
    <div class="block p-6 rounded-lg bg-white max-w-sm">
            <form  method="POST" action="{{ route('Users.store') }}">
                @csrf

                <div class="form-group mb-6">
                  <label for="name" class="form-label inline-block mb-2 text-gray-700">Utilisateur Nom & Prénom</label>
                  <input type="text"class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                          id="name" name="name" value="{{ old('name') }}" required placeholder="Nom & Prénom">
                  @error('name') 
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
              </div>

                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Utilisateur Adresse E-mail</label>
                    <input type="email"class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" required placeholder="Adresse E-mail">
                    @error('email') 
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <label for="exampleInputPassword2" class="form-label inline-block mb-2 text-gray-700">Utilisateur Mot de passe</label>
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="password" name="password" value="{{ old('password') }}" autocomplete="new-password" required placeholder="Mot de passe">
                        @error('password') 
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                </div>
                
                {{-- <button class="btn btn-primary" type="submit">Ajouter</button> --}}
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                    </div>
                </div>
            </form>
    </div>
</div>
</div>
@endsection
