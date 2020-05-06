@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Garaż</h1>
        </div>
    </div>
    <h1>Ciągniki</h1>
    @foreach ($cars as $item)
    <div class="row justify-content-center mb-4">     
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">{{ $item->nazwa }}</h2>
                    <h2 class="float-right">{{ $item->nr }}</h2>
                </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{$item->link}}" class="img-fluid rounded" alt="Responsive image"><br>
                        
                    <div class="row mt-3 ml-1">
                        <h4 class="mr-3"><small class="text-muted">Silnik</small> {{$item->silnik}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Rok produkcji</small> {{$item->rok}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Podwozie</small> {{$item->podwozie}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Kabina</small> {{$item->kabina}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Przebieg</small> {{$item->przebieg}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Data zakupu</small> {{$item->data}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Kierowca</small> {{$item->kierowca}}</h4>
                        @if(Auth::user()->ranga == 'Admin')
                            {!! Form::model($item, ['route' => ['cars.delete', $item], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger">Usuń</button>
                            {!! Form::close() !!} 
                            <a class="btn btn-info" href="{{route('cars.edit', $item)}}">Edytuj</a>
                        @endif
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <h1>Naczepy</h1>
    @foreach ($trailers as $item)
    <div class="row justify-content-center mb-4">     
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">{{ $item->nazwa }}</h2>
                    <h2 class="float-right">{{ $item->nr }}</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{$item->link}}" class="img-fluid rounded" alt="Responsive image"><br>
                        
                    <div class="row mt-3 ml-1">
                        <h4 class="mr-3"><small class="text-muted">Rok produkcji</small> {{$item->rok}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Typ</small> {{$item->typ}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Przebieg</small> {{$item->przebieg}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Data zakupu</small> {{$item->data}}</h4>
                        <h4 class="mr-3"><small class="text-muted">Kierowca</small> {{$item->kierowca}}</h4>
                        @if(Auth::user()->ranga == 'Admin')
                            {!! Form::model($item, ['route' => ['trailers.delete', $item], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger">Usuń</button>
                            {!! Form::close() !!} 
                            <a class="btn btn-info" href="{{route('trailers.edit', $item)}}">Edytuj</a>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection