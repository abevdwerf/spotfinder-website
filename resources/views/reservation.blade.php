@extends('layout')

@section('content')
    <section class="finder">
    </section>
{{--        TODO hier moet info over de aangeklikte reservering komen--}}

    <main>
        {{$reservation->reservationStartAndBeginTime()}}
    </main>
@endsection



