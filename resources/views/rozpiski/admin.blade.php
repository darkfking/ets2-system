@extends('layouts.app')
@include('menu')
@section('content')
<?php 
$nr=0;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Oddane rozpiski</h1>
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
                            <th scope="col">Kierowca</th>
                            <th scope="col">Zatwierdź</th>
                            <th scope="col">Odrzuć</th>
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
                            <td>{{$item->kierowca}}</td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{route('rozpiski.accept', $item->id)}}">Akceptuj</a>
                            </td>
                            <td>
                              <a class="btn btn-danger btn-block" href="{{route('rozpiski.reject', $item->id)}}">Odrzuć</a>
                          </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
        </div>
    </div>
</div>
@endsection