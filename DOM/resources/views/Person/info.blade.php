@extends('layouts.app')
    <div class="row">
        <div class=" col-lg-1  toppad" >
            @include('menu')
        </div>
        <div class=" col-lg-6 col-lg-offset-0 toppad" >
            <br>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="pull-right">
                        {!! Form::open(['route' => ['deleteWard',$Ward->id],'method'=>'DELETE'])!!}
                        {{Form::button('<i class="glyphicon glyphicon-trash"> Obriši</i>', array('type' => 'submit','id'=>'brisi1', 'class' => 'btn btn-link'))}}
                        {!! Form::close() !!}
                    </div>
                    <h3 class="panel-title"><a href="{{URL::route('showWard',$Ward->id)}}">{{$Ward->first_name.' '.$Ward->last_name}}</a> </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4 " align="center">
                            <img alt="User Pic" src="/uploads/profile_pictures/{{$Ward->profile_picture}}" class="img-circle img-responsive" >
                            {!! Form::open(['route' => ['addProfile_picture',$Ward->id],'files' => true,'method'=>'post'])!!}
                            {!! Form::label('profile_picture','Promjeni sliku') !!}
                            {!! Form::file('profile_picture',['onchange'=>"javascript:this.form.submit();"]) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class=" col-md-9 col-lg-7 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Datum rođenja:</td>
                                    <td><?=$Ward->dat_rođenja?></td>
                                </tr>
                                <tr>
                                    <td>Adresa:</td>
                                    <td><?=$Ward->adress?></td>
                                </tr>
                                <tr>
                                    <td>Kontakt:</td>
                                    <td><?=$Ward->kontakt?></td>
                                </tr>
                                <tr>
                                    <td>OIB:</td>
                                    <td><?=$Ward->oib?></td>
                                </tr>

                                <tr>
                                    <td>Broj zdravstvene:</td>
                                    <td><?=$Ward->br_zdravstvene?></td>
                                </tr>
                                <tr>
                                    <td>Broj sobe:</td>
                                    <td><?=$Ward->br_sobe?></td>
                                </tr>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">

                    <a href="{{URL::route('editWard',$Ward->id)}}" ><i class="glyphicon glyphicon-edit"></i> Uredi</i> </a>

                    <span class="pull-right">

                        {!! Form::open(['route' => ['addPictures',$Ward->id],'files' => true,'method'=>'post'])!!}
                        {!! Form::label('addPictures','Dodajte slike') !!}
                        {!! Form::file('addPictures',['onchange'=>"javascript:this.form.submit();"]) !!}
                        {!! Form::close() !!}
                    </span>
                </div>
            </div>

            <!-- Galerija -->
            @php if(!empty($Ward->slike()))
                {
            @endphp
            <div class="row">
                    @foreach($Ward->slike() as $slika)
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">



                            <a href='{{ route('showImage',[$Ward->id,$slika])  }}' target="_blank">
                                <img src="{{ route('showImage',[$Ward->id,$slika])  }}" class="img-responsive"></a>



                            {!! Form::open(['route' => ['deletePicture',$Ward->id,$slika],'method'=>'get'])!!}
                            {{Form::button('Obriši', array('type' => 'submit', 'class' => 'btn-xs btn-block btn-default'))}}
                            {!! Form::close() !!}
                        </div>
                    @endforeach

            </div>
            @php
                }
            @endphp
        </div>
        <br>

        <!-- Terapija desni dio ekrana -->

        @php if($Ward->terapija!=NULL)
       {
        @endphp
        <div class="col-lg-3" id="terapija">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="pull-right">
                        <a href="{{URL::route('editWard',$Ward->id)}}" title="Dodaj terapiju" ><i class="glyphicon glyphicon-plus"></i></a>
                    </div>

                    <h3 class="panel-title"><i class="glyphicon glyphicon-pushpin"> Terapija</i></h3>

                </div>
                <div class="panel-body">
                    {{ Form::textarea('terapija', $Ward->terapija, ['id'=>'terapija_info','readonly'=>"readonly"]) }}
                </div>

            </div>
        </div>


        @php
        }
        @endphp


        @php if($Ward->stvari!=NULL)
       {
        @endphp
        <div class="col-lg-3" id="terapija">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="pull-right">
                        <a href="{{URL::route('editWard',$Ward->id)}}" title="Dodaj terapiju" ><i class="glyphicon glyphicon-plus"></i></a>
                    </div>

                    <h3 class="panel-title"><i class="glyphicon glyphicon-pushpin"> Osobne stvari</i></h3>

                </div>
                <div class="panel-body">
                    {{ Form::textarea('stvari', $Ward->stvari, ['id'=>'terapija_info','readonly'=>"readonly"]) }}
                </div>

            </div>
        </div>
        @php
            }
        @endphp



    </div>
<br>


