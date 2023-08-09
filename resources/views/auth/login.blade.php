@extends('products.layout')
@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">

    <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Connectez-vous</h6>
        <div class="card-body">
            @if (session('success'))
            <div>
                {{ session('success')}}
            </div>
            @endif
            @error('email')
                    <div class="btn btn-danger">
                        {{$message}}
                      </div>
                    @enderror
        <form action="{{ route('connexion') }}" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-lg" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de pass</label>
                    <input type="password"class="form-control form-control-lg" name="password" required>
                </div>
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">connexion</button>
            </form>
        </div> 
    </div> 

    </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>

@endsection