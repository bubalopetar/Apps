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
                    @include('Inventar.li')
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

                    {{Form::open(['route'=>'addInventar'])}}

                    {{ Form::label('name','Naziv:') }}
                    {{Form::text('name',null,array('class'=>'form-control','id'=>"forma"))}}

                    {{Form::submit('Spremi',array('class'=>'btn-lg btn-block btn-primary ','style'=>'margin-top: 20px;margin-bottom:-30px'))}}
                    {{Form::close()}};
                </li>
            </ul>


        </div>
    </div>
</div>





