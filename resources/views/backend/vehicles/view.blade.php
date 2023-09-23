@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">{{$vehicle->name}}</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">Vehicles</a></li>

            <li class="breadcrumb-item active"  aria-current="page">{{$vehicle->name}}</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
 

                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="btn btn-link" href="#">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-link" href="#">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-link" href="#">Pricing</a>
                                    </li>
                              
                                    </ul>
                                </div>
                            </nav>
                            </div>
                        </div>
                   



@endsection
