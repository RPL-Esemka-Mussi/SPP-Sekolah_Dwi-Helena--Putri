@extends('main.bootstrap')

@section('content')
 <div class="text-center py-3 bg-dark text-light">
    <h2>Selamat datang </h2><br>
         <h4>{{ auth()->user()->name }}</h4>
 </div>
@endsection