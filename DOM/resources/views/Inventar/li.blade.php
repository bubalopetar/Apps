<li class="list-group-item">
    <div class="row">
        <div class="col-sm-3" style="width: 28%;word-wrap: break-word; ">
            <h4>{{Form::label($li->name)}}</h4>
        </div>

        <div class="col-sm-1" style="margin-top: 10px">
            {!! Form::open(['route' => ['changeInventar_time',$li->id],'method'=>'GET'])!!}
            {{Form::button('<i class="glyphicon glyphicon-plus"></i>',['title'=>'Potrošeno','class'=>'btn btn','id'=>'povecaj_inventar', 'type'=>'submit'])}}
            {{Form::close()}}
        </div>



        <!---- datum -->
        <div class=" col-sm-2" style="width: 21%;margin-top: 10px;">
            @if($id==$li->id)
                {{Form::open(['route'=>['listInventarDate',$li->id], 'method'=>'POST'])}}
                {{Form::date('date',$datum,['class'=>'datepicker form-control','onchange'=>'this.form.submit()'])}}
            {{Form::close()}}
            @endif
            @if($id!=$li->id)
                    {{Form::open(['route'=>['listInventarDate',$li->id], 'method'=>'POST'])}}
                    {{Form::date('date',null,['class'=>'datepicker form-control','onchange'=>'this.form.submit()'])}}
                    {{Form::close()}}
                @endif
        </div>


        <div class=" col-sm-1" style="width: 11%;word-wrap: break-word; ">
            @if($id==$li->id)
            <label><h4 >{{$li->naDan($datum).' kom.'}}</h4></label>
            @else
                <h4 >--</h4>
            @endif
        </div>



        <div class=" col-sm-1" style="width: 13%;word-wrap: break-word; ">
            @if($id==$li->id)
                <h4 >{{$li->naMjesec($datum).' kom.'}}</h4>
            @else
                <h4 >--</h4>
            @endif
        </div>


        <div class=" col-sm-1" style="width: 11%;word-wrap: break-word; ">
            <h4>{{$li->ukupna_kolicina().' kom.'}}</h4>
        </div>

        <div class="pull-right">
            {!! Form::open(['route' => ['deleteInventar',$li->id],'method'=>'DELETE'])!!}
            {{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit','class' => 'btn btn-link'))}}
            {!! Form::close() !!}
        </div>
    </div>
</li>