@include('menu');
@extends('layouts.app')

    <div class="row">
        <div class="col-xs-12 col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading c-list">

                                        <span class="title">Štićenici</span>
                    <ul class="pull-right c-controls">
                        <li><a href="{{URL::route('addWard')}}" data-toggle="tooltip" data-placement="top" title="Dodaj korisnika"><i class="glyphicon glyphicon-plus"></i></a></li>
                    </ul>
                </div>



                <ul class="list-group" id="contact-list">
                    @foreach($Wards as $Ward)
                        <li class="list-group-item">

                            <div class="pull-right">
                                {!! Form::open(['route' => ['deleteWard',$Ward->id],'method'=>'DELETE'])!!}
                                <a id="uredi_korisnika" href="{{URL::route('editWard',$Ward->id)}}" ><i class="glyphicon glyphicon-edit"> </i> Uredi</a>
                                <div id="brisi_korisnika">
                                    {{Form::button('<i class="glyphicon glyphicon-trash">Obriši</i>', array('type' => 'submit','id'=>'brisi_korisnika','class' => 'btn btn-link'))}}
                                </div>
                                {!! Form::close() !!}

                            </div>

                            <div class="col-sm-2">
                                <img alt="User Pic" src="/uploads/profile_pictures/{{$Ward->profile_picture}}" class="img-circle img-responsive" >
                            </div>

                             <span class="name">
                                        <a href="{{URL::route('showWard',$Ward->id)}}"><?php echo $Ward->first_name;echo ' '; echo$Ward->last_name?></a><BR>
                                         <h4>{{$Ward->dat_rođenja.',&nbsp;&nbsp;&nbsp;'.'Soba broj '.$Ward->br_sobe}} </h4>
                             </span>






                            <div class="clearfix"></div>
                        </li>

                    @endforeach

                </ul>
            </div>
        </div>
    </div>



</div>




