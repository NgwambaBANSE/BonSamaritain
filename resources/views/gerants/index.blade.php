@extends('products.layout')
@section('content')
<br>
<br>
    <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="margin-left:400px">
               <h2><strong>LES GERANTS DE BON SAMARITAIN</strong></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('gerant.store')}}"> Ajouter un gerant</a>
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
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->nom }}</td>
            <td>{{ $user->prenom }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="#" method="POST">
                    <a class="btn btn-info" href="{{ route('gerants.show',$user->id) }}">Afficher</a>
                    @csrf
                   @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le produit : {{ $user->nom }} ?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection