
@include('menu')
@extends('layouts.app')
@section('content')
@include('errors')

    <div class="row">

        <div class="col-lg-7 col-lg-offset-3 toppad">

            {!! Form::model($Room,['route'=>['editRoom',$Room->id],'method'=>'PUT']) !!}

            {{ Form::label('br_sobe','Broj sobe:') }}
            {{Form::number('br_sobe',null,array('class'=>'form-control','id'=>"forma",'placeholder'=>'unesite broj sobe'))}}
            <br>
            {{ Form::label('br_kreveta','Broj kreveta:') }}
            {{Form::select('br_kreveta', array('1' => '1', '2' => '2','Višekrevetna'=>'Višekrevetna'),array('class'=>'form-control','id'=>"forma"))}}
            <br><br>
            <div class="col-md-13">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Opis</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::textarea('opis', null, ['size' => '103x10']) }}
                    </div>
                </div>
            </div>

            {{Form::submit('Spremi',array('class'=>'btn-lg btn-block btn-primary ','style'=>'margin-top: 20px;'))}}

            {!! Form::close() !!}
            <hr>
        </div>

    </div>




@endsection
