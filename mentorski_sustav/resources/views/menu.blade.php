
<div id="menu"class="btn-group btn-group-justified" role="group" aria-label="...">

    <?php

        if(Auth::user()->role=='mentor')
            {
    ?>

    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="{{ URL::route('svi_korisnici')}}">Studenti</a></div>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="{{ URL::route('svi_predmeti')}}">Predmeti</a></div>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="{{ URL::route('DodajPredmet')}}">Dodaj Predmet</a></div>
    <div class="btn-group" role="group">
        <?php } ?>

        {!! Form::open(['route'=>['logout'],'method'=>'GET']) !!}
        {{ Form::button('Logout', array('type' => 'submit','class' => 'btn btn-primary','role'=>'group')) }}
        {{Form::close()}}


    </div>
</div>
