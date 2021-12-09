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
                @if ($specification["location"]["location_name"] == "")
                    No location selected
                @else
                    {{ $specification["location"]["location_name"] }}
                @endif
                <br/> <br/>
            </li>
            <li>
                <b>Number of people:</b> <br/>
                @if ($specification["numberOfPeople"] == 0)
                    No number of people selected
                @else
                    {{ $specification["numberOfPeople"] }}
                @endif
                <br/> <br/>
            </li>
            <li>
                <b>Roomtypes:</b> <br/>
                @if ( $specification["filters"][1] === false && $specification["filters"][2] === false && $specification["filters"][3] === false )
                    No allowed room-types selected
                @else
                    {{ $specification["filters"][1] ? "Desks" : "" }} <br/>
                    {{ $specification["filters"][2] ? "Silent room" : "" }} <br/>
                    {{ $specification["filters"][3] ? "Meeting room" : "" }} <br/>
                @endif
            </li>
        </ul>
    </div>
@endif