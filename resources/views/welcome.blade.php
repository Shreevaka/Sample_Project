@extends('layouts.normal')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h1>SAMPLE PROJECT</h1><br><br><br><br>
        
        <a href="{{ route('loginpage') }}" class="btn btn-primary btn-lg btn-block">Login</a><br><br>
        <a href="{{ route('registerpage') }}" class="btn btn-primary btn-lg btn-block">Register</a>
            
        </div>
    </div>
</div>
@endsection
