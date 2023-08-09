@extends('products.layout')
@section('content')
<br>
<br>
    <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier les information du gerant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Retour</a>
            </div>
        </div>
    </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Verrifier bien les champs.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nom</strong>
                    <input type="text" name="nom" value="{{ $user->nom }}" class="form-control" placeholder="nom">
                </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>prenom</strong>
                <input type="text" name="prenom" class="form-control" value="{{ $user->prenom }}" placeholder="Prenom">
              </div>
            </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>email</strong>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="email">
             </div>
           </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection