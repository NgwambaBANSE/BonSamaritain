@extends('products.layout')
@section('content')
<br>
<br>
    <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier un produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> retour</a>
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
                    <strong>name_produit</strong>
                    <input type="text" name="name_produit" value="{{ $product->name_produit }}" class="form-control" placeholder="Name">
                </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix:</strong>
                <input type="number" name="prix" class="form-control" value="{{ $product->prix }}" placeholder="Prix">
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/images/{{ $product->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection