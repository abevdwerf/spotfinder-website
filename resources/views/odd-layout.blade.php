@extends("base")

@section("page")
    <body class="body body__center-content">
        <div class="lava-circle__wrapper flex">

            @yield('content')

            <div class="lava-circles">
                <div class="lava-circle"></div>
                <div class="lava-circle"></div>
                <div class="lava-circle"></div>
                <div class="lava-circle"></div>
            </div>
        </div>
    </body>
@endsection