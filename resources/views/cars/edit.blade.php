@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Garaż</h1>
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
                    {!! Form::model($car, ['route' => ['cars.update', $car], 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('nazwa', "Nazwa: ") !!}
                        {!! Form::text('nazwa', $car->nazwa, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('silnik', "Silnik: ") !!}
                        {!! Form::text('silnik', $car->silnik, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('nr', "Numer rejestracyjny: ") !!}
                        {!! Form::text('nr', $car->nr, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('rok', "Rok produkcji: ") !!}
                        {!! Form::text('rok', $car->rok, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('podwozie', "Rodzaj podwozia: ") !!}
                        {!! Form::text('podwozie', $car->podwozie, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('kabina', "Typ kabiny: ") !!}
                        {!! Form::text('kabina', $car->kabina, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('przebieg', "Przebieg: ") !!}
                        {!! Form::text('przebieg', $car->przebieg, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('data', "Data zakupu: ") !!}
                        {!! Form::text('data', $car->data, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('kierowca', "Kierowca: ") !!}
                        {!! Form::text('kierowca', $car->kierowca , ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', "Link do zdjęcia: ") !!}
                        {!! Form::text('link', $car->link , ['class'=>'form-control']) !!}
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