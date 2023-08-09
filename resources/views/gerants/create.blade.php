@extends('products.layout')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
<!-- <h1>Formulaire ajout de client<h2> -->
    <div class="card">
    <div class="card-body">
    <h3>Ajouter un Gerant<h3>
</div>
        <div class="card-body">
            @if (session('success'))
            <div>
                {{ session('success')}}
            </div>
            @endif
            <form action="{{ route('gerant.add') }}" method="POST" class="vstack gap-3">
                @csrf
                <div class="form-group">
                    <label for="texte">Nom</label>
                    <input type="texte" class="form-control" name="nom" required>
                    @error('nom')
                    <div>
                        {{$message}}
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="texte">Prénom</label>
                    <input type="texte" class="form-control" name="prenom" required>
                    @error('prenom')
                    <div>
                        {{$message}}
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                    @error('email')
                    <div>
                        {{$message}}
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mot de pass</label>
                    <input type="password" class="form-control" name="password" required>
                    @error('password')
                    <div>
                        {{$message}}
                      </div>
                    @enderror
                </div>
     <button type="submit" class="w-10 btn btn-lg btn-outline-primary">Valider</button> 
    </div> 
    </div> 
    </div> 
    </div> 
    </div> 
    </div> 
    </div> 
    </div> 

@endsection