@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Karta kierowcy</h1>
        </div>
    </div>


    @foreach ($karta as $item)
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card text-white bg-dark mb-3" >
          <div class="card-header text-center"><h2>{{$item->name}} - <i>{{$item->ranga}}</i></h2></div>
          <div class="card-body">
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4 p-0" style="height:180px;">
                    <h2 class="card-body text-center text-dark">Stan konta</h2>
                    <h1 class="text-center text-white">{{$item->konto}} zł</h1>                                    
                </div>
              </div>

              <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4 p-0" style="height:180px;">
                    <h2 class="card-body text-center text-dark">Przejechane kilometry</h2>
                    <h1 class="text-center text-white">{{$item->kilometry}} km</h1>                                    
                </div>
              </div>

              <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4 p-0" style="height:180px;">
                    <h2 class="card-body text-center text-dark">Spalone paliwo</h2>
                    <h1 class="text-center text-white">{{$item->paliwo}} l</h1>                                    
                </div>
              </div>

              <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4 p-0" style="height:180px;">
                    <h2 class="card-body text-center text-dark">Średnie spalanie</h2>
                    <h1 class="text-center text-white">@if($item->kilometry != 0){{number_format($item->kilometry / $item->paliwo, 2)}} @endif l/km</h1>                                    
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xl-6 col-md-6">
                <div class="card bg-info text-white mb-4 p-0" style="height:180px;">
                    <h2 class="card-body text-center text-dark">Ciężarówka</h2>
                    <h1 class="text-center text-white">
                      @foreach ($ciezarowka as $item1)
                        {{$item1->nazwa}}
                      @endforeach
                    </h1>                                    
                </div>
              </div>

              <div class="col-xl-6 col-md-6">
                <div class="card bg-info text-white mb-4 p-0" style="height:180px;">
                    <h2 class="card-body text-center text-dark">Naczepa</h2>
                    <h1 class="text-center text-white">
                      @foreach ($naczepa as $item2)
                        {{$item2->nazwa}}
                      @endforeach
                    </h1>                                    
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12">
        <h3>
        @if($item->going == '1') DLC Going East <input type="checkbox" name="" id="" checked disabled> @else DLC Going East <input type="checkbox" name="" id="" disabled> @endif
        <br>@if($item->skandynawia == '1') DLC Skandynawia <input type="checkbox" name="" id="" checked disabled> @else DLC Skandynawia <input type="checkbox" name="" id="" disabled> @endif
        <br>@if($item->france == '1') DLC Viva le France <input type="checkbox" name="" id="" checked disabled> @else DLC Viva le France <input type="checkbox" name="" id="" disabled> @endif
        <br>@if($item->italia == '1') DLC Italia <input type="checkbox" name="" id="" checked disabled> @else DLC Italia <input type="checkbox" name="" id="" disabled> @endif
        <br>@if($item->baltic == '1') DLC Beyond the Baltic Sea <input type="checkbox" name="" id="" checked disabled> @else DLC Beyond the Baltic Sea <input type="checkbox" name="" id="" disabled> @endif
        <br>@if($item->blacksea == '1') DLC Road to the Black Sea <input type="checkbox" name="" id="" checked disabled> @else DLC Road to the Black Sea <input type="checkbox" name="" id="" disabled> @endif
        <br>@if($item->promods == '1') PROMODS <input type="checkbox" name="" id="" checked disabled> @else PROMODS <input type="checkbox" name="" id="" disabled> @endif
        <br>@if($item->rusmapa == '1') Rusmapa <input type="checkbox" name="" id="" checked disabled> @else Rusmapa <input type="checkbox" name="" id="" disabled> @endif
        </h3>
      </div>
    </div>
    @endforeach
</div>
@endsection