@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            @include('menu')
            </div>
            <div class="col-md-8 col-md-offset-2">


                <h4 style="float: left; width: 50%;">Predmeti:</h4>
                <h4 style="float: right; width: 49%; text-align: left;">Upisi ({{$user['email']}})</h4>

                <div id="pd" class="panel panel-default" style="width: 49%; float:left;overflow-y: scroll; height:500px;">

                    @foreach($nisu_upisani as $nu)

                        {!! Form::open(['route'=>['dodaj_upisni',$user['id'],$nu['id']],'method'=>'GET','id'=>'dodaj_upisni']) !!}
                        <p id="p2">
                            {{$nu->ime}}
                            {{ Form::button('<i id="dodaj"  class="glyphicon glyphicon-plus"></i>', array('type' => 'submit','class' => 'btn btn-link','id'=>'add_course','display'=>'inline-block')) }}

                        </p>
                        {!! Form::close() !!}
                    @endforeach




                </div>

                <h5 id="semestri" style="float: right; width: 49%;">Semestar 1:</h5>
                @include('course_user.semestar',['course'=>$upisani_predmeti,'user'=>$user,'sem'=>1])
                <h5 id="semestri" style="float: right; width: 49%;">Semestar 2:</h5>
                @include('course_user.semestar',['course'=>$upisani_predmeti,'user'=>$user,'sem'=>2])
                <h5 id="semestri" style="float: right; width: 49%;">Semestar 3:</h5>
                @include('course_user.semestar',['course'=>$upisani_predmeti,'user'=>$user,'sem'=>3])
                <h5 id="semestri" style="float: right; width: 49%;">Semestar 4:</h5>
                @include('course_user.semestar',['course'=>$upisani_predmeti,'user'=>$user,'sem'=>4])
                <h5 id="semestri" style="float: right; width: 49%;">Semestar 5:</h5>
                @include('course_user.semestar',['course'=>$upisani_predmeti,'user'=>$user,'sem'=>5])
                <h5 id="semestri" style="float: right; width: 49%;">Semestar 6:</h5>
                @include('course_user.semestar',['course'=>$upisani_predmeti,'user'=>$user,'sem'=>6])




            </div>
        </div>
    </div>
@endsection
