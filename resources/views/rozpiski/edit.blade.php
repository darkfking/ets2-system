@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Uzupełnij rozpiskę</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::model($rozpiska, ['route' => ['rozpiski.update', $rozpiska], 'method' => 'PUT']) !!}
                    @if(Auth::user()->ranga == 'Admin')
                    <div class="form-group">
                        {!! Form::label('kraj1', "Kraj początkowy: ") !!}
                        {!! Form::text('kraj1', $rozpiska->kraj1, ['class'=>'form-control']) !!}
                    </div>
                    @else
                    <div class="form-group">
                        {!! Form::label('kraj1', "Kraj początkowy: ") !!}
                        {!! Form::text('kraj1', $rozpiska->kraj1, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label('miasto1', "Miasto początkowe: ") !!}
                        {!! Form::select('miasto1', $miasta, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-6">
                        {!! Form::label('miasto11', "Dodaj miasto do listy:") !!}
                        {!! Form::text('miasto11', null, ['class'=>'form-control']) !!}
                        
                    </div>
                    <a class="btn btn-primary" onclick="addOption()" id="zmien1">Dodaj miasto</a>
                    @if(Auth::user()->ranga == 'Admin')
                    <div class="form-group">
                        {!! Form::label('kraj2', "Kraj końcowy: ") !!}
                        {!! Form::text('kraj2', $rozpiska->kraj2, ['class'=>'form-control']) !!}
                    </div>
                    @else 
                    <div class="form-group">
                        {!! Form::label('kraj2', "Kraj końcowy: ") !!}
                        {!! Form::text('kraj2', $rozpiska->kraj2, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label('miasto2', "Miasto końcowe: ") !!}
                        {!! Form::select('miasto2', $miasta2, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-6">
                        {!! Form::label('miasto22', "Dodaj miasto do listy:") !!}
                        {!! Form::text('miasto22', null, ['class'=>'form-control']) !!}
                        
                    </div>
                    <a class="btn btn-primary" onclick="addOption2()" id="zmien2">Dodaj miasto</a>
                    <div class="form-group">
                        {!! Form::label('kmpuste', "Kilometry puste: ") !!}
                        {!! Form::text('kmpuste', $rozpiska->kmpuste, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('kmztowarem', "Kilometry z towarem: ") !!}
                        {!! Form::text('kmztowarem', $rozpiska->kmztowarem, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('koszty', "Koszty: ") !!}
                        {!! Form::text('koszty', $rozpiska->koszty, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('paliwo', "Zużyte paliwo: ") !!}
                        {!! Form::text('paliwo', $rozpiska->paliwo, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Oddaj trasę ') !!}
                        {!! Form::checkbox('status', '1', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addOption() { 
    $('#miasto11').keyup(function() {
        var value = $(this).val();
        $('#miasto1').append(`<option value="${value}"> 
                                   ${value} 
                              </option>`);
    }).keyup();  
    $('#miasto11').hide();
    $('#zmien1').hide();
    } 
    function addOption2() { 
    $('#miasto22').keyup(function() {
        var value1 = $(this).val();
        $('#miasto2').append(`<option value="${value1}"> 
                                   ${value1} 
                              </option>`);
    }).keyup();  
    $('#miasto22').hide();
    $('#zmien2').hide();
    } 
</script>
@endsection