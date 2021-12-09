@if (count($rooms) > 0)
    @foreach($rooms as $room)
        <div class="rooms__item rooms__item--extended box flex" data-id="{{ $room->id }}">
            <div class="rooms__content">
                <span class="rooms__floor">Ground floor</span>
                <h4 class="h4">{{ $room->room_name }}</h4>
            </div>

            <p class="rooms__spots flex">
                <span>
                    <span class="rooms__highlight">4</span>/ {{ $room->max_persons }}
                </span>

                <span>Spots</span>
            </p>
        </div>
    @endforeach
@else
    <div class="rooms__item--error box">
        <h3 class="h3">No available workspaces found</h3>

        <p>Search specifications:</p> <br/>

        <ul>
            <li>
                <b>Location:</b> <br/>
                @if (!isset($location->location_name))
                    No location selected
                @else
                    {{ $location->location_name }}
                @endif
                <br/> <br/>
            </li>
            <li>
                <b>Number of people:</b> <br/>
                @if ($numberOfPeople == 0)
                    No number of people selected
                @else
                    {{ $numberOfPeople }}
                @endif
                <br/> <br/>
            </li>
            <li>
                <b>Roomtypes:</b> <br/>
                @if ( $filters[1] === false && $filters[2] === false && $filters[3] === false )
                    No allowed room-types selected
                @else
                    {{ $filters[1] ? "Desks" : "" }} <br/>
                    {{ $filters[2] ? "Silent room" : "" }} <br/>
                    {{ $filters[3] ? "Meeting room" : "" }} <br/>
                @endif
            </li>
        </ul>
    </div>
@endif
