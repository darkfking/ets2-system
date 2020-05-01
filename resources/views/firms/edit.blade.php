@extends('layouts.app')
@include('menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Edytuj regulamin</h1>
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
                    {!! Form::model($firm, ['route' => ['firms.update', $firm], 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('regulamin', "Regulamin: ") !!}
                        {!! Form::textarea('regulamin', $firm->regulamin, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mody', "Wymagane mody: ") !!}
                        {!! Form::text('mody', $firm->mody, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('poradniki', "Poradniki: ") !!}
                        {!! Form::textarea('poradniki', $firm->poradniki, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('koszty', "Koszty firmy: ") !!}
                        {!! Form::textarea('koszty', $firm->koszty, ['class'=>'form-control']) !!}
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