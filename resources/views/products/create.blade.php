@extends('products.layout')
@section('content')
<br>
<br>
<div class="container-scroller">
    <div class="col-lg-6 margin-tb">
        <div class="pull-left">
            <h2>Ajouter un nouveau produit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}">Retour</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Erreur lors de l'ajout de produit. Veillez reessayez<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom du produit:</strong>
                <input type="text" name="name_produit" class="form-control" placeholder="Nom du produit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix:</strong>
                <input type="number" name="prix" class="form-control" placeholder="Prix du produit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category:</strong>
                <select class="form-select" name="category" aria-label="Default select example" id="">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->libele}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
       </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
</form>
@endsection