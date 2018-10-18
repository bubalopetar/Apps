@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

               @include('menu')

                @include('course.errors')
                <h4>Lista predmeta:</h4>

                <div class="panel panel-default">
                            @foreach($courses as $course)


                                    {!! Form::open(['route'=>['obrisi_predmet',$course->id],'method'=>'DELETE','id'=>'brisi','class'=>'form-inline',]) !!}
                        <p id="p1">

                        {{$course->ime}} ({{$course->kod}})
                                    <a href="{{URL::route('edit',$course->id)}}" > <i id="icon" class="glyphicon glyphicon-edit"></i></a>
                            {{Form::button('<i class="glyphicon glyphicon-trash">z  </i>', array('type' => 'submit', 'class' => 'btn btn-link','style'=>'display: inline-block'))}}

                        </p>
                        {!! Form::close() !!}




                            @endforeach
                </div>
             </div>
        </div>
    </div>
@endsection
