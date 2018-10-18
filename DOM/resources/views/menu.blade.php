<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{URL::route('listWards')}}">Štićenici</a>
    <a href="{{URL::route('listRooms')}}">Sobe</a>
    <a href="{{URL::route('listInventar')}}">Inventar</a>

    @if(Auth::user()->status=='administrator')
        <a href="{{URL::route('listUsers')}}">Korisnici</a>
@endif
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Odjavite se!
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>

    <!-- Use any element to open the sidenav -->
    <span id="MenuIcon" style="margin-left:20px; font-size:50px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->

