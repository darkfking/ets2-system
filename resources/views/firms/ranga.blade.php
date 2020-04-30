@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Zmiana rangi</h1>
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
                    {!! Form::model($user, ['route' => ['firms.rangaup', $user], 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('name', "Nick: ") !!}
                        {!! Form::text('name', $user->name, ['class'=>'form-control', 'disabled'=>'disabled']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ranga', "Ranga: ") !!}
                        {!! Form::text('ranga', $user->ranga, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                    <h2 style="color:red;" class="text-center">Ranga "Admin" posiada wszystkie uprawnienia</h2>
                </div>
            </div>
        </div>
</div>
@endsection