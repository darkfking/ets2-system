@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Dodaj ciężarówke</h1>
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
                    {!! Form::open(['route' => 'cars.store']) !!}
                        <div class="form-group">
                            {!! Form::label('nazwa', "Nazwa: ") !!}
                            {!! Form::text('nazwa', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('silnik', "Silnik: ") !!}
                            {!! Form::text('silnik', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('nr', "Numer rejestracyjny: ") !!}
                            {!! Form::text('nr', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('rok', "Rok produkcji: ") !!}
                            {!! Form::text('rok', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('podwozie', "Rodzaj podwozia: ") !!}
                            {!! Form::text('podwozie', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('kabina', "Typ kabiny: ") !!}
                            {!! Form::text('kabina', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('przebieg', "Przebieg: ") !!}
                            {!! Form::text('przebieg', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('data', "Data zakupu: ") !!}
                            {!! Form::text('data', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('kierowca', "Kierowca: ") !!}
                            {!! Form::text('kierowca', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', "Link do zdjęcia: ") !!}
                            {!! Form::text('link', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Dodaj', ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection