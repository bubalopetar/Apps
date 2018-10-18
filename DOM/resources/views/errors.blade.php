@if (Session::has('uspjeh'))
    <div class="alert alert-success" align="center" width="40%">
        <strong>Osoba je uspješno dodana!</strong>
    </div>
@endif
@if (Session::has('obrisan'))
    <div class="alert alert-success" align="center" width="40%">
        <strong>Osoba je uspješno obrisana!</strong>
    </div>
@endif

@if (Session::has('promjena'))
    <div class="alert alert-success" align="center" width="40%">
        <strong>Podatci uspješno promjenjeni!</strong>
    </div>
@endif

@if (Session::has('uspjeh soba'))
    <div class="alert alert-success" align="center" width="40%">
        <strong>Soba je uspješno dodana!</strong>
    </div>
@endif

@if (Session::has('uspjeh soba uređena'))
    <div class="alert alert-success" align="center" width="40%">
        <strong>Soba je uspješno uređena!</strong>
    </div>
@endif



@if(count($errors)> 0)
    <div class="alert alert-danger" align="center"  width="40%">
        <strong>Greške:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li  style="list-style-type:none">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif