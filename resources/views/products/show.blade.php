@extends('products.layout')
@section('content')
<br>
<br>
    <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
           <div class="pull-left">
                <h2>Les details du produit </h2>
           </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                {{ $product->prix }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/images/{{ $product->image }}" width="500px">
            </div>
        </div>
    </div>
@endsection