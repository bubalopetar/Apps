
@include('menu');
@extends('layouts.app')
@section('content')



    <div class="col-lg-8 col-lg-offset-3">

        {!! Form::open(['route' => 'addUser']) !!}

        <div class="col-lg-6">


            {{ Form::label('ime','Ime:') }}
            {{Form::text('ime',null,array('class'=>'form-control','id'=>"forma"))}}

            {{ Form::label('lozinka','Lozinka:') }}
            {{Form::text('lozinka',null,array('class'=>'form-control','id'=>"forma"))}}


        {{Form::submit('Dodaj novog korisnika!',array('class'=>'btn-lg btn-block btn-primary ','style'=>'margin-top: 20px;'))}}
        {!! Form::close() !!}


    </div>


@endsection
