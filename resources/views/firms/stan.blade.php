@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Stan konta</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            {!! Form::model($firm, ['route' => ['firms.stanup', $firm], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('konto', "Stan konta: ") !!}
                {!! Form::text('konto', $firm->konto, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('stawkapusta', "Stawka za puste kilometry: ") !!}
                {!! Form::text('stawkapusta', $firm->stawkapusta, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('stawkaladunek', "Stawka za trasę z ładnukiem: ") !!}
                {!! Form::text('stawkaladunek', $firm->stawkaladunek, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('stawkafirma', "Stawka za trasę z ładnukiem dla firmy: ") !!}
                {!! Form::text('stawkafirma', $firm->stawkafirma, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection