@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Edytuj DLC i mody</h1>
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
                    {!! Form::model($user, ['route' => ['karta.updatemapy', $user], 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('going', "DLC Going East: ") !!}
                        Tak {!! Form::radio('going', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('going', "0", ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('skandynawia', "DLC Skandynawia: ") !!}
                        Tak {!! Form::radio('skandynawia', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('skandynawia', "0", ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('france', "DLC Viva le France: ") !!}
                        Tak {!! Form::radio('france', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('france', "0", ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('italia', "DLC Italia: ") !!}
                        Tak {!! Form::radio('italia', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('italia', "0", ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('baltic', "DLC Beyond the Baltic Sea: ") !!}
                        Tak {!! Form::radio('baltic', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('baltic', "0", ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('blacksea', "DLC Road to the Black Sea: ") !!}
                        Tak {!! Form::radio('blacksea', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('blacksea', "0", ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('promods', "Promods: ") !!}
                        Tak {!! Form::radio('promods', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('promods', "0", ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('rusmapa', "Rusmapa: ") !!}
                        Tak {!! Form::radio('rusmapa', "1", ['class'=>'form-control']) !!}
                        Nie {!! Form::radio('rusmapa', "0", ['class'=>'form-control']) !!}
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