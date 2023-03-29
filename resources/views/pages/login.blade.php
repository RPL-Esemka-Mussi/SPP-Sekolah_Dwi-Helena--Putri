<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP Sekolah</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">SPP Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
<div class="vh-100" style="background-color: hsl(0,0%,0%,4%)">
  <div class="container h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class=".col-md-8 col-lg-8 col-xl-8 col-sm-12-col-12">
        <div class="card text-center">
          <div class="card-body">
            <h3 class="py-5">Login</h3>
            @if(Session::has('error'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> {{ Session::get('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{url('auth')}}" method="post">
              @csrf
              <input type="email" name="email" id="email" class="form-control py-2 mt-3 mb-2" placeholder="Email">
              <input type="password" name="password" id="password" class="form-control py-2" placeholder="Password">
              <button type="submit" class="mt-3 btn btn-primary py-2 px-5">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
