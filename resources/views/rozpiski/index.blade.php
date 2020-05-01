@extends('layouts.app')
@include('menu')
@section('content')
<?php 
$nr=0;
$liczba = 0;
?>
@foreach ($rozpiski as $item)
    <?php $liczba++; ?>
@endforeach
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Rozpiski</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <?php if($liczba == 0){ ?> 
            {!! Form::open(['route' => 'rozpiski.store']) !!}
                <div class="form-group">
                    {!! Form::submit('Generuj trasy', ['class'=>'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
            <?php } ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numer trasy</th>
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
                    @foreach ($rozpiski as $item)
                    <?php $nr++; ?>
                    <tr>
                        <th scope="row">{{$nr}}</th>
                        <td>{{$item->kraj1}}</td>
                        <td>{{$item->miasto1}}</td>
                        <td>{{$item->kraj2}}</td>
                        <td>{{$item->miasto2}}</td>
                        <td>{{$item->kmpuste}}</td>
                        <td>{{$item->kmztowarem}}</td>
                        <td>{{$item->koszty}}</td>
                        <td>{{$item->paliwo}}</td>
                        <td><a class="btn btn-success btn-block" href="{{route('rozpiski.edit', $item)}}">Uzupełnij i oddaj</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center mt-5">Rozpiski do poprawy</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Numer trasy</th>
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
                    @foreach ($rozpiskipop as $item)
                    <?php $nr++; ?>
                    <tr>
                        <th scope="row">{{$nr}}</th>
                        <td>{{$item->kraj1}}</td>
                        <td>{{$item->miasto1}}</td>
                        <td>{{$item->kraj2}}</td>
                        <td>{{$item->miasto2}}</td>
                        <td>{{$item->kmpuste}}</td>
                        <td>{{$item->kmztowarem}}</td>
                        <td>{{$item->koszty}}</td>
                        <td>{{$item->paliwo}}</td>
                        <td><a class="btn btn-warning btn-block" href="{{route('rozpiski.edit', $item)}}">Popraw i oddaj</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection