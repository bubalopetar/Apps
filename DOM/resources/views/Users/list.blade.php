@extends('layouts.app')
<div class="row">
    <div class=" col-lg-1  toppad" >
        @include('menu')
    </div>
<div class=" col-lg-5 col-lg-offset-2 toppad" ><br>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="{{URL::route('addUser')}}" data-toggle="tooltip" data-placement="top" title="Dodaj korisnika"><i class=" glyphicon glyphicon-plus"></i></a>
            </div>
            <h3 class="panel-title col-sm-offset-1">Korisnici</h3>
        </div>
        <div class="panel-body">
                <div class="  col-lg-12 ">
                    <table class="table table-user-information">
                        <tbody>
                        @foreach($Users as $user)
                            <tr>
                                <td><div class="pull-right">
                                        <div class="row">
                                            {{Form::open(['route'=>['changeUserStatus',$user->id],'method'=>'GET'])}}
                                            {{Form::select('status',['trenutni_status'=>$user->status,'novi_status'=>$user->novi_status()],null,['class'=>'btn btn-primary', 'onchange'=>'this.form.submit()'])}}
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                    {!! Form::open(['route' => ['deleteUser',$user->id],'method'=>'DELETE'])!!}
                                    {{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit','id'=>'brisi_usera','class' => 'btn btn-link'))}}
                                    {{$user->name}}
                                    {!! Form::close() !!}
                                    </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
