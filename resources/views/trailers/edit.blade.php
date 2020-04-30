@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Dodaj naczepę</h1>
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
                    {!! Form::model($trailer, ['route' => ['trailers.update', $trailer], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('nazwa', "Nazwa: ") !!}
                            {!! Form::text('nazwa', $trailer->nazwa, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('rok', "Rok produkcji: ") !!}
                            {!! Form::text('rok', $trailer->rok, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('nr', "Numer rejestracyjny: ") !!}
                            {!! Form::text('nr', $trailer->nr, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('typ', "Typ: ") !!}
                            {!! Form::text('typ', $trailer->typ, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('przebieg', "Przebieg: ") !!}
                            {!! Form::text('przebieg', $trailer->przebieg, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('data', "Data zakupu: ") !!}
                            {!! Form::text('data', $trailer->data, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('kierowca', "Kierowca: ") !!}
                            {!! Form::text('kierowca', $trailer->kierowca, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', "Link do zdjęcia: ") !!}
                            {!! Form::text('link', $trailer->link, ['class'=>'form-control']) !!}
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