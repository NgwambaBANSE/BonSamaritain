@extends('products.layout')
@section('content')
<br>
<br>
<ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
            <form> 
              <button>Recherche</button>
           </form>
            </div>
          </li>
        </ul>

    <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="margin-left:400px">
               <h2><strong>ALIMENTATION BON SAMARITAIN</strong></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('products.create') }}"> Ajouter un nouveau produit</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
       <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Category</th>
            <th>Non du produit</th>
            <th>Prix(Fcfa)</th>
            <!-- <th>Category</th> -->
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $product->image }}" width="100px"></td>
            <td>{{ $product->category->libele }}</td>
            <td>{{ $product->name_produit }}</td>
            <td>{{ $product->prix }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Afficher</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Modifier</a>
                    @csrf
                   @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
</div>
@endsection