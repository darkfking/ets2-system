@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Karta kierowcy</h1>
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

                    @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="btn btn-danger">{{ $error }}</div>
                            @endforeach
                    @endif

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('mark', "Marka:") !!}
                                {!! Form::text('mark', $car->mark, ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('model', "Model:") !!}
                                {!! Form::text('model', $car->model, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('engine', "Silnik:") !!}
                                {!! Form::text('engine', $car->engine, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('power', "Moc:") !!}
                                {!! Form::text('power', $car->power, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('equipment', "Cena:") !!}
                                {!! Form::text('equipment', $car->equipment, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::label('content', "Opis:") !!}
                        {!! Form::textarea('content', $car->content, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Zaaktualizuj informacje', ['class'=>'btn btn-lg btn-success']) !!}
                        
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
