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
                    <div class="form-group">
                        {!! Form::label('kraj1', "Kraj początkowy: ") !!}
                        {!! Form::text('kraj1', $rozpiska->kraj1, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('miasto1', "Miasto początkowe: ") !!}
                        {!! Form::text('miasto1', $rozpiska->miasto1, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('kraj2', "Kraj końcowy: ") !!}
                        {!! Form::text('kraj2', $rozpiska->kraj2, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('miasto2', "Miasto końcowe: ") !!}
                        {!! Form::text('miasto2', $rozpiska->miasto2, ['class'=>'form-control']) !!}
                    </div>

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
@endsection