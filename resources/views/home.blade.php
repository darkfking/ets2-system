@extends('layouts.app')
@include('menu')
@section('content')
<?php $kilometry = 0; $spalanie = 0; $rozile = 0;?>

                    @foreach ($rozpiski as $item3)
                        <?php
                        $rozile++;
                        ?>
                    @endforeach

                    @foreach ($ogolne as $item2)
                        <?php
                        $kilometry += $item2->kilometry;
                        $spalanie += $item2->paliwo;
                        ?>
                    @endforeach
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12 text-center">
            @foreach($firm as $item)
            <h1>Stan konta firmowego {{$item->konto}}  zł</h1>
            @endforeach
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <table class="table text-center table-responsive-xl">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Przejechane kilometry</th>
                    <th scope="col">Spalone paliwo</th>
                    <th scope="col">Zatwierdzone rozpiski</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$kilometry}}</td>
                    <td>{{$spalanie}}</td>
                    <td>{{$rozile}}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <table class="table text-center table-responsive-xl">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nick</th>
                    <th scope="col">Spalone paliwo</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ogolne as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                    <td>@if($item->kilometry != 0){{ number_format($item->kilometry / $item->paliwo, 2)}} @endif l/km</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>

        <div class="col-md-4">
            <table class="table text-center table-responsive-xl">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nick</th>
                    <th scope="col">Przejechane kilometry</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ogolne as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->kilometry}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>

        <div class="col-md-4">
            <table class="table text-center table-responsive-xl">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nick</th>
                    <th scope="col">Stan konta</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ogolne as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->konto}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
