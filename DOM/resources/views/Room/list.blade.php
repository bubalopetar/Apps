@include('menu');
@extends('layouts.app')

<div class="row">

    <div class="col-sm-offset-1 col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading c-list">
                <span class="title">Sobe</span>
                <ul class="pull-right c-controls">
                    <li><a href="{{URL::route('addRoom')}}" data-toggle="tooltip" data-placement="top" title="Dodaj sobu"><i class=" glyphicon glyphicon-plus"></i></a></li>
                </ul>
            </div>



            <ul class="list-group" id="contact-list">
                @foreach($Rooms as $room)
                    <li class="list-group-item">

                        <div id="sobe" class="row">
                            <div class="col-lg-2">
                            Broj sobe: <h3> {{$room->br_sobe}}</h3><br>
                            Broj kreveta:<h3> {{$room->br_kreveta }}</h3>
                            </div>
                            <div  class="pull-right">
                                <a id="uredi_sobu"  href="{{URL::route('editRoom',$room->id)}}" ><i class="glyphicon glyphicon-edit"> </i> Uredi</a>
                                {!! Form::open(['route' => ['deleteRoom',$room->id],'method'=>'DELETE'])!!}
                                {{Form::button('<i class="glyphicon glyphicon-trash">Obriši</i>', array('type' => 'submit', 'class' => 'btn btn-link'))}}
                                {!! Form::close() !!}
                            </div>


                            @php if($room->opis!=NULL)
                                {
                            @endphp
                                        <div class="col-sm-5">
                                            {{ Form::textarea('opis','Kliknite za otvoriti opis!'.PHP_EOL.$room->opis,[ 'id'=>'opis_sobe','onclick'=>"textAreaAdjust(this)",'style'=>"overflow:hidden",'readonly'=>'readonly']) }}
                                        </div>
                            <div id="sticenici" class="col-lg-offset-6">
                                Štićenici:
                                <h4>
                                    @foreach($room->Wards() as $Ward)
                                        <a href="{{route('showWard',$Ward->id)}}">{{$Ward->first_name.' '.$Ward->last_name}}</a>
                                    @endforeach
                                </h4></div>
                            @php
                            }
                            else{@endphp
                            <div class="col-sm-5">
                                {{ Form::textarea('opis','Nema opisa',[ 'id'=>'opis_sobe','style'=>"overflow:hidden",'readonly'=>'readonly','placeholder'=>'Kliknite da otvorite']) }}
                            </div>

                            <div id="sticenici" class="col-lg-offset-6">
                            Štićenici:
                            <h4>
                            @foreach($room->Wards() as $Ward)
                                <a href="{{route('showWard',$Ward->id)}}">{{$Ward->first_name.' '.$Ward->last_name}}</a>
                            @endforeach
                            </h4></div>
                            @php
                            }
                            @endphp


                        </div>


                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>


