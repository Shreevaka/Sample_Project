<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Sample Project</title>
    <!-- <link rel="stylesheet" type="css" href="{{ url('/css/style.css') }}" /> -->
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" /> -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    
</head>
<body>
<br>
<div class="container">
<div class="card">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
    <!-- style="background-color: #b3ecff;" -->
        <a class="navbar-brand" href="#">
            <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
            sample
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard">Home <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
            
            <div class="dropdown">
                <h6 class="dropdown-toggle" data-toggle="dropdown">
                    {{ auth()->user()->name}}
                </h6>
                <div class="dropdown-menu">
                    
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        LogOut
                    </a>
                </div>
            </div>
        </div>
    </nav></div>
    
    <br>
    <div class="row">
        <div class="col-12">@section('heading')@show</div>
    </div>
    
    @yield('content')
</div>
</body>
</html>