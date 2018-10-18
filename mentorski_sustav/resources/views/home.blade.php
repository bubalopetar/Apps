@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            @include('menu')

            <h4>Svi korisnici:</h4>
            <div class="panel panel-default">
                <medium>
                @foreach($users as $user)
                <p id="p1"><a href="{{URL::route('upisni_list',$user->id)}}">{{$user->email}}</a> </p>
                    @endforeach
                </medium>
            </div>
        </div>
    </div>
</div>
@endsection
