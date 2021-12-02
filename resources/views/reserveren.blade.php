@extends('layout')

@section('content')
    <section class="finder">
        <a href="#" class="finder__collapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
            </svg>
        </a>

        <h1 class="h1">Zoeken naar een mogelijke reservatie</h1>

        <form action="./" method="post" class="finder__form form">
            <div class="form__input-wrapper">
                <label class="form__label flex" for="finder-location">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11.667" height="16.667" viewBox="0 0 11.667 16.667">
                        <path d="M10.833,2A5.829,5.829,0,0,0,5,7.833c0,4.375,5.833,10.833,5.833,10.833s5.833-6.458,5.833-10.833A5.829,5.829,0,0,0,10.833,2Zm0,7.917a2.083,2.083,0,1,1,2.083-2.083A2.084,2.084,0,0,1,10.833,9.917Z" transform="translate(-5 -2)" fill="#b1b1b1" />
                    </svg>

                    Locatie
                </label>
                <input type="text" class="form__input" id="finder-location" placeholder="Selecteer een locatie">
            </div>

            <div class="form__input-wrapper">
                <label class="form__label flex" for="finder-people-amount">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14.183" height="17" viewBox="0 0 14.183 17">
                        <path d="M91.126,8.189a3.962,3.962,0,0,0,2.9-1.2,3.962,3.962,0,0,0,1.2-2.9,3.962,3.962,0,0,0-1.2-2.9,4.094,4.094,0,0,0-5.79,0,3.962,3.962,0,0,0-1.2,2.895,3.962,3.962,0,0,0,1.2,2.9A3.963,3.963,0,0,0,91.126,8.189Zm0,0" transform="translate(-84.142)" fill="#b1b1b1" />
                        <path d="M14.149,252.177a10.114,10.114,0,0,0-.138-1.074,8.464,8.464,0,0,0-.264-1.08,5.335,5.335,0,0,0-.444-1.007,3.8,3.8,0,0,0-.67-.872,2.952,2.952,0,0,0-.962-.6,3.324,3.324,0,0,0-1.228-.222,1.246,1.246,0,0,0-.665.282c-.2.13-.433.281-.693.447a3.971,3.971,0,0,1-.9.4,3.483,3.483,0,0,1-2.194,0,3.962,3.962,0,0,1-.9-.4c-.258-.165-.491-.315-.694-.447a1.245,1.245,0,0,0-.665-.282,3.319,3.319,0,0,0-1.228.222,2.949,2.949,0,0,0-.962.6,3.8,3.8,0,0,0-.669.872,5.345,5.345,0,0,0-.444,1.007,8.484,8.484,0,0,0-.264,1.08,10.078,10.078,0,0,0-.138,1.075c-.023.325-.034.663-.034,1a2.823,2.823,0,0,0,.838,2.136A3.018,3.018,0,0,0,3,256.1h8.186a3.017,3.017,0,0,0,2.16-.788,2.821,2.821,0,0,0,.839-2.136c0-.343-.012-.68-.034-1Zm0,0" transform="translate(0 -239.104)" fill="#b1b1b1" />
                    </svg>
                    
                    Aantal personen
                </label>
                <input style="display: none;" type="number" class="form__input" id="finder-people-amount">

                <div class="form__input form__custom-scroll flex" style="overflow: auto;">
                    @for ($options = 0; $options < 7; $options++)
                        <div class="form__selection-item flex">
                            <span>{{ $options }}</span>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="form__input-wrapper">
                <div class="form__label flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16.254" viewBox="0 0 17 16.254">
                        <path d="M17.329,15.6,19.1,20.537l5.422.322c.752.054.913.752.376,1.127l-4.134,3.275,1.4,5.207c.215.752-.429,1.127-.966.752l-4.348-2.953L12.283,31.22c-.644.429-1.181-.107-.966-.7l1.449-5.046L8.525,22.04A.637.637,0,0,1,8.9,20.859l5.261-.161,1.933-5.046A.631.631,0,0,1,17.329,15.6Z" transform="translate(-8.214 -15.121)" fill="#b1b1b1" fill-rule="evenodd" />
                    </svg>
                    
                    Room types
                </div>
                <div class="form__check-buttons">
                    <div class="btn form__check-button">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.256" height="15" viewBox="0 0 9.256 15">
                                <g transform="translate(-445 -452.5)">
                                    <g transform="translate(423.2 448.2)">
                                        <path d="M22.867,4.3v6.236H21.8v3.151h4.136v1.74l-2.609,3.151.755.624,1.854-2.232V19.3h.985V16.97L28.775,19.2l.755-.624L26.92,15.427v-1.74h4.136V10.536H29.989V4.3Zm.985.985H29v5.252H23.851Zm6.22,7.418H22.785V11.521h7.287Z" />
                                    </g>
                                    <rect width="6" height="8" transform="translate(447 453)"  />
                                    <rect width="9" height="2" transform="translate(445 459)"  />
                                </g>
                            </svg>

                            <span class="check-text">Bureau</span>
                        </div>
                    </div>

                    <div class="btn form__check-button">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14">
                                <path d="M7.56,4.757,4.432,8H.844A.86.86,0,0,0,0,8.875v5.25A.86.86,0,0,0,.844,15H4.432L7.56,18.243A.841.841,0,0,0,9,17.625V5.376A.841.841,0,0,0,7.56,4.757Zm8.67,6.743,1.6-1.664a.6.6,0,0,0,0-.832l-.8-.832a.553.553,0,0,0-.8,0l-1.6,1.664-1.6-1.664a.553.553,0,0,0-.8,0l-.8.832a.6.6,0,0,0,0,.832l1.6,1.664-1.6,1.664a.6.6,0,0,0,0,.832l.8.832a.553.553,0,0,0,.8,0l1.6-1.664,1.6,1.664a.553.553,0,0,0,.8,0l.8-.832a.6.6,0,0,0,0-.832Z" transform="translate(0 -4.5)" />
                            </svg>

                            <span class="check-text">Stilte kamer</span>
                        </div>
                    </div>

                    <div class="btn form__check-button">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14.183" height="17" viewBox="0 0 14.183 17">
                                <path d="M91.126,8.189a3.962,3.962,0,0,0,2.9-1.2,3.962,3.962,0,0,0,1.2-2.9,3.962,3.962,0,0,0-1.2-2.9,4.094,4.094,0,0,0-5.79,0,3.962,3.962,0,0,0-1.2,2.895,3.962,3.962,0,0,0,1.2,2.9A3.963,3.963,0,0,0,91.126,8.189Zm0,0" transform="translate(-84.142)" />
                                <path d="M14.149,252.177a10.114,10.114,0,0,0-.138-1.074,8.464,8.464,0,0,0-.264-1.08,5.335,5.335,0,0,0-.444-1.007,3.8,3.8,0,0,0-.67-.872,2.952,2.952,0,0,0-.962-.6,3.324,3.324,0,0,0-1.228-.222,1.246,1.246,0,0,0-.665.282c-.2.13-.433.281-.693.447a3.971,3.971,0,0,1-.9.4,3.483,3.483,0,0,1-2.194,0,3.962,3.962,0,0,1-.9-.4c-.258-.165-.491-.315-.694-.447a1.245,1.245,0,0,0-.665-.282,3.319,3.319,0,0,0-1.228.222,2.949,2.949,0,0,0-.962.6,3.8,3.8,0,0,0-.669.872,5.345,5.345,0,0,0-.444,1.007,8.484,8.484,0,0,0-.264,1.08,10.078,10.078,0,0,0-.138,1.075c-.023.325-.034.663-.034,1a2.823,2.823,0,0,0,.838,2.136A3.018,3.018,0,0,0,3,256.1h8.186a3.017,3.017,0,0,0,2.16-.788,2.821,2.821,0,0,0,.839-2.136c0-.343-.012-.68-.034-1Zm0,0" transform="translate(0 -239.104)" />
                            </svg>

                            <span class="check-text">Vergaderruimte</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__input-wrapper form__input-wrapper--submit">
                <input type="submit" class="btn btn--thirdiary" value="Zoeken">
            </div>
        </form>
    </section>

    <main>
        <h2 class="h1">Reserveerbare werkplekken</h2>

        <div class="rooms__wrapper flex">
            <div class="rooms flex">
                @for ($roomOptions = 0; $roomOptions < 5; $roomOptions++)
                    <a href="#" class="rooms__item @if ($roomOptions === 1) rooms__item--selected @endif box flex">
                        <span class="rooms__floor">Begande grond</span>
                        <h4 class="h4">Oil 0.10</h4>
                    </a>
                @endfor
            </div>

            <div class="rooms__detailed box">
                <div class="rooms__info flex">
                    <div class="rooms__info-left">
                        <h2 class="h2">Oil 0.10 - Stilte kamer</h2>
                        <p>Capacity of 6 people</p>
                    </div>
    
                    <div class="rooms__info-right">
                        <a href="#" class="btn btn--thirdiary">Reserveren</a>
                        <p>Vandaag: 13:00 - 14:00</p>
                    </div>
                </div>

                <hr class="rooms__divider">

                <img style="margin-left: 5%; width: 90%;" class="rooms__image" src="{{ url('img/room-preview.png') }}" alt="Room preview">
            </div>
        </div>
    </main>
@endsection