<div id="pd2" class="panel panel-default" style="width: 49%; float:right;">

    <?php

        foreach ($upisani_predmeti as $up)
            {
                $semestar=$up->semestar($user);
                if($semestar===$sem)
                   {

                       $upisni_list=\App\Course::find($up['id']);
                       $status=$upisni_list->status_za_studenta($user->id);

                        if($status[0]['status']==='polozen'){
                      ?><p id="p4"><button id="btn-polozen" class="bnt btn-link"><i class='glyphicon glyphicon-ok'></i></button> <?php
                        echo $up['ime']; echo "</p>";   }

                else{

            ?>
            <p id="p3">
                    {!! Form::open(['route'=>['promjeni_status_predmeta',$up,$user['id']],'method'=>'PUT','id'=>'status','class'=>'form-inline',]) !!}

                    {{ Form::button('<i id="icon-check" class="glyphicon glyphicon-check"></i>', array('type' => 'submit','class' => 'btn btn-link','id'=>'btn_check','display'=>'inline-block')) }}
                    {{Form::close()}}




                    <a href="{{URL::route('brisi_upisni_list',[$user['id'],$up->id])}}" > <button  id="btn-remove" class=" btn-link" type="submit"><i id="icon-remove" class="glyphicon glyphicon-remove"></i></button>
                    </a>

       <?php
                       $predmet=$up->toArray();
                    echo $predmet['ime'];?> </p><?php
                   }

            }
        }
    ?>

</div>