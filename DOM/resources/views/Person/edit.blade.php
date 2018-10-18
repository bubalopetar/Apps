
@include('menu');
@extends('layouts.app')
@section('content')
    @include('errors')

    <div class="col-lg-10 col-lg-offset-1">
        {!! Form::model($Ward,['route'=>['editWard',$Ward->id],'method'=>'PUT']) !!}

        <div class="col-lg-6">


            {{ Form::label('ime','Ime:') }}
            {{Form::text('first_name',null,array('class'=>'form-control','id'=>"forma"))}}

            {{ Form::label('prezime','Prezime:') }}
            {{Form::text('last_name',null,array('class'=>'form-control','id'=>"forma"))}}

            {{ Form::label('dat_rođenja','Datum rođenja:') }}
            {{Form::date('dat_rođenja',$Ward->dat_rođenja,array('class'=>'form-control','id'=>"forma"))}}

            {{ Form::label('adresa','Adresa:') }}
            {{Form::text('adress',null,array('class'=>'form-control','id'=>"forma"))}}

            {{ Form::label('kontakt','Kontakt:') }}
            {{Form::number('kontakt',null,array('class'=>'form-control','id'=>"forma"))}}

            {{ Form::label('oib','OIB:') }}
            {{Form::number('oib',null,array('class'=>'form-control','id'=>"forma",'placeholder'=>'11-znamenkasti kod'))}}

            {{ Form::label('br_zdravstvene','Broj zdravstvene:') }}
            {{Form::number('br_zdravstvene',null,array('class'=>'form-control','id'=>"forma",'placeholder'=>'9-znamenkasti kod'))}}
            <br>
            {{ Form::label('br_sobe','Broj sobe:') }}
            {{Form::select('br_sobe',$ids,array('class'=>'form-control','id'=>"forma"))}}
            <br>
        </div>

        <div class="col-lg-6">


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Terapija</h3>
                </div>
                <div class="panel-body">
                    {{ Form::textarea('terapija', null) }}
                </div>
            </div>


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Osobne stvari</h3>
                </div>
                <div class="panel-body">
                    {{ Form::textarea('stvari', null) }}
                </div>
            </div>

        </div>
        {{Form::submit('Spremi',array('id'=>'spremi','class'=>'btn-lg btn-block btn-primary ','style'=>'margin-top: 20px;'))}}
        {!! Form::close() !!}


    </div>


@endsection
