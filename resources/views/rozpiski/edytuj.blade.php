@extends('layouts.app')
@include('menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Wszystkie rozpiski</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numer trasy</th>
                        <th scope="col">Kierowca</th>
                        <th scope="col">Kraj początkowy</th>
                        <th scope="col">Miasto początkowe</th>
                        <th scope="col">Kraj końcowy</th>
                        <th scope="col">Miasto końcowe</th>
                        <th scope="col">Kilometry puste</th>
                        <th scope="col">Kilometry z ładunkiem</th>
                        <th scope="col">Koszty</th>
                        <th scope="col">Zużyte paliwo</th>
                        <th scope="col">Oddaj</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($allroz as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->kierowca }}</td>
                        <td>{{$item->kraj1}}</td>
                        <td>{{$item->miasto1}}</td>
                        <td>{{$item->kraj2}}</td>
                        <td>{{$item->miasto2}}</td>
                        <td>{{$item->kmpuste}}</td>
                        <td>{{$item->kmztowarem}}</td>
                        <td>{{$item->koszty}}</td>
                        <td>{{$item->paliwo}}</td>
                        <td><a class="btn btn-success btn-block" href="{{route('rozpiski.edit', $item)}}">Edytuj</a>
                            {!! Form::model($item, ['route' => ['rozpiski.delete', $item], 'method' => 'DELETE']) !!}
                            <button class="btn btn-danger">Usuń</button>
                        {!! Form::close() !!} 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection