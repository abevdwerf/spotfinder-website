<div class="rooms__detailed box">
    <div class="rooms__info flex">
        <div class="rooms__info-left">
            <h2 class="h2">OIL {{ $room[0]->room_name }} - Silent room</h2>
        </div>
    </div>

    <hr class="rooms__divider">

    {{-- <img style="margin-left: 5%; width: 90%;" class="rooms__image" src="{{ url('img/room-preview.png') }}" alt="Room preview"> --}}

    <canvas class="rooms__placing" width="700" height="350" data-gridtemplate="{{ json_encode($gridTemplate) }}">
        <!--
            Aspect ratio of canvas always has to be: 2 to 1 (2:1)
            Those attributes have to be placed on the element iself (not by CSS)
            For more lines on the grid you can bump those numbers
        -->
    </canvas>
</div>