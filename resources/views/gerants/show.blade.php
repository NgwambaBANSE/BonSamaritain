@extends('products.layout')
@section('content')
<br>
<br>
    <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
           <div class="pull-left">
                <h2>Les details du gerant </h2>
           </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('gerants.index') }}"> Retour</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/images/{{ $users->image }}" width="500px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $users->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prenom:</strong>
                {{ $users->prenom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                {{ $users->email }}
            </div>
        </div>
    </div>
@endsection