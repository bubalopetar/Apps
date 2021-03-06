@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                @include('menu')

                     @include('course.errors')
                    {!! Form::open(['route' => 'DodajPredmet']) !!}

                    {{ Form::label('ime','Naziv predmeta:',['id'=>"l1"]) }}
                    {{Form::text('ime',null,array('class'=>'form-control','id'=>"forma"))}}

                    {{ Form::label('kod','Kod:') }}
                    {{Form::text('kod',null,array('class'=>'form-control','id'=>"forma"))}}

                    {{ Form::label('bodovi','Bodovi:') }}
                    {{Form::text('bodovi',null,array('class'=>'form-control','id'=>"forma"))}}

                    {{ Form::label('program','Program:') }}
                    {{Form::textarea('program',null,array('class'=>'form-control','id'=>"forma",'size' => '30x5'))}}

                    {{ Form::label('sem_redovni','Semestar redovni:') }}
                    {{Form::number('sem_redovni',null,array('class'=>'form-control','id'=>"forma"))}}

                    {{ Form::label('sem_izvanredni','Semestar izvanredni:') }}
                    {{Form::number('sem_izvanredni',null,array('class'=>'form-control','id'=>"forma"))}}

                    {{ Form::label('izborni','Izborni:') }}
                    {{Form::select('izborni', ['da' => 'Da', 'ne' => 'Ne'],null,array('class'=>'form-control','id'=>"forma"))}}

                    {{Form::submit('Spremi',array('class'=>'btn-lg btn-block btn-primary','style'=>'margin-top: 20px;'))}}
                    {!! Form::close() !!}
                <hr>
            </div>
        </div>
@endsection
