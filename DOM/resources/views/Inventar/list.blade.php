@extends('layouts.app')
@include('menu');

<div class="row">
    <div class="col-lg-8" style="margin-left: 20px;width: 73%">
        <div class="panel panel-default">
            <div class="panel-heading c-list">
                    <span class="title col-sm-3" style="width: 25%">Dodaj inventar</span>
                    <div class="title col-sm-1" style="width: 15%">Potrošeno</div>
                        <div class="title col-sm-3" style="width: 17%">Na datum</div>

                    <div class="title col-sm-1" style="width: 11%" >Dnevna</div>
                    <div class="title col-sm-1"style="width: 13%">Mjesečna</div>

                    <div class="title col-sm-1"style="width: 13%">Ukupno</div>

                </div>

            <ul class="list-group" id="contact-list">
                @foreach($list as $li)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-3" style="width: 28%">
                            <h4>{{Form::label($li->name)}}</h4>
                        </div>

                        <div class="col-sm-1" style="margin-top: 10px">
                            {!! Form::open(['route' => ['changeInventar_time',$li->id],'method'=>'GET'])!!}
                            {{Form::button('<i class="glyphicon glyphicon-plus"></i>',['class'=>'btn btn','id'=>'povecaj_inventar', 'type'=>'submit'])}}
                            {{Form::close()}}
                        </div>



                        <!---- datum -->
                        <div class=" col-sm-2" style="width: 21%;margin-top: 10px;">
                            {{Form::open(['route'=>['listInventarDate',$li->id], 'method'=>'POST'])}}
                                {{Form::date('date',null,['class'=>'datepicker form-control','onchange'=>'this.form.submit()'])}}
                            {{Form::close()}}
                        </div>


                        <div class=" col-sm-1" style="width: 11%;">
                            <h4 >--</h4>
                        </div>



                        <div class=" col-sm-1" style="width: 13%;">
                            <h4>--</h4>
                        </div>
                        <div class=" col-sm-1" style="width: 11%">
                            <h4>{{$li->ukupna_kolicina().' kom.'}}</h4>
                        </div>

                        <div class="pull-right">
                        {!! Form::open(['route' => ['deleteInventar',$li->id],'method'=>'DELETE'])!!}
                            {{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit','class' => 'btn btn-link'))}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </div>

    <div class="col-lg-3" >
        <div class="panel panel-default">
            <div class="panel-heading c-list">
                <span class="title">Dodaj inventar</span>
            </div>

            <ul class="list-group" id="contact-list">
                <li class="list-group-item">
                    {{Form::open(['route'=>'addInventar','method'=>'POST'])}}
                    {{ Form::label('name','Naziv:') }}
                    {{Form::text('name',null,array('class'=>'form-control','id'=>"forma"))}}
                    {{Form::submit('Spremi',array('class'=>'btn-lg btn-block btn-primary ','style'=>'margin-top: 20px;margin-bottom:-30px'))}}
                    {{Form::close()}};
                </li>
            </ul>


        </div>
    </div>
</div>





