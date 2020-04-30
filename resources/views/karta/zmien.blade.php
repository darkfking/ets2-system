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
            {!! Form::model($user, ['route' => ['karta.zmienHaslo', $user], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('password', "Stan konta: ") !!}
                {!! Form::text('password', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Zmień hasło', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection