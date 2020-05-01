@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Wybierz opcje</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel admina</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-3">  
                        <div class="col-12">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Garaż
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item btn-block" href="{{ route('cars.create')}}">Dodaj ciężarówkę</a>
                                <a class="dropdown-item" href="{{ route('trailers.create')}}">Dodaj naczepę</a>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row mb-3">  
                        <div class="col-12">
                            <a class="btn btn-danger btn-block" href="{{route('rozpiski.admin')}}">Oddane rozpiski</a>
                        </div>
                    </div>

                    <div class="row mb-3">  
                        <div class="col-12">
                            <a class="btn btn-primary btn-block" href="{{route('rozpiski.edytuj')}}">Edytuj rozpiski</a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            @foreach($firm as $item) 
                                <a class="btn btn-warning btn-block" href="{{route('firms.stan', $item)}}">Zmień stan konta i stawki</a></h1>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
