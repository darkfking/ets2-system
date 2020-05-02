@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Firma</h1>
        </div>
    </div>
    @foreach ($firms as $item)
    <div class="row justify-content-center mb-4">     
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Koszty firmy</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif       
                    <pre class="text-center">{{ $item->koszty }}</pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">     
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Regulamin</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif       
                    <pre class="text-center">{{ $item->regulamin }}</pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">     
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Wymagane mody</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif       
                    <pre class="text-center">{{ $item->mody }}</pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">     
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Poradniki</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif       
                    <pre class="text-center">{{ $item->poradniki }}</pre>
                </div>
            </div>
        </div>
    </div>
    
    @if(Auth::user()->ranga == 'Admin')
        <a class="btn btn-info btn-block" href="{{route('firms.edit', $item)}}">Edytuj dane</a>
    @endif
    @endforeach 
    <div class="row">
        <div class="col-12 text-center">
            <h1>Kierowcy</h1>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">l.p</th>
            <th scope="col">Nick</th>
            <th scope="col">Ranga</th>
            <th scope="col">Pokonany dystans</th>
            <th scope="col">Spalone paliwo</th>,
            <th scope="col">Średnie spalanie</th>
            @if(Auth::user()->ranga == 'Admin')
                <th scope="col">Usuń konto</th>
            @endif
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>
                {{$item->ranga}} 
                @if(Auth::user()->ranga == 'Admin')
                    <a class="btn btn-warning btn-block" href="{{route('firms.ranga', $item)}}">Zmień range</a>
                @endif
            </td>
            <td>{{$item->kilometry}} km</td>
            <td>{{$item->paliwo}} l</td>
            <td>@if($item->kilometry != 0){{ number_format($item->paliwo / $item->kilometry *100, 2)}} @endif l/km</td>
            @if(Auth::user()->ranga == 'Admin')
            <td>
            {!! Form::model($item, ['route' => ['firms.delete', $item], 'method' => 'DELETE']) !!}
                <button class="btn btn-danger">Usuń</button>
            {!! Form::close() !!} 
            </td>
            @endif
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection