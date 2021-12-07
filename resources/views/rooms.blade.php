@foreach($rooms as $room)
    <a class="rooms__item box flex" href="{{ url('room/'.$room->id) }}" class="rooms">
        <span class="rooms__floor">Ground floor</span>
        <h4 class="h4">{{ $room->room_name }}</h4>
    </a>
@endforeach