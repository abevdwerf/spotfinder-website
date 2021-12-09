@extends('base')

@section('page')
    <body class="body body--side-nav body--active-finder">
        <div class="navigation__head flex">
            <svg class="navigation__head-logo" xmlns="http://www.w3.org/2000/svg" width="160" height="90" viewBox="0 0 160 90">
                <path d="M27.311,36.846a20.2,20.2,0,0,1-6.641-3.071l2.952-6.413a19.8,19.8,0,0,0,5.689,2.787A21.541,21.541,0,0,0,35.893,31.2a10.549,10.549,0,0,0,5.424-1.08,3.242,3.242,0,0,0,1.734-2.86,2.738,2.738,0,0,0-1.033-2.189,7.971,7.971,0,0,0-2.656-1.386q-1.623-.525-4.383-1.153a60.665,60.665,0,0,1-6.958-2,11.248,11.248,0,0,1-4.649-3.2,8.56,8.56,0,0,1-1.941-5.88,10.182,10.182,0,0,1,1.749-5.837A11.786,11.786,0,0,1,28.47,1.491,21.8,21.8,0,0,1,37.147,0a28.829,28.829,0,0,1,6.958.839A20.7,20.7,0,0,1,50.053,3.25L47.4,9.714A20.942,20.942,0,0,0,37.074,6.8a9.758,9.758,0,0,0-5.342,1.153A3.523,3.523,0,0,0,30,11a2.978,2.978,0,0,0,1.978,2.86,31.7,31.7,0,0,0,6.088,1.817,61.734,61.734,0,0,1,6.958,1.992,11.584,11.584,0,0,1,4.664,3.13,8.4,8.4,0,0,1,1.933,5.837,9.966,9.966,0,0,1-1.778,5.756,11.98,11.98,0,0,1-5.32,4.086A22.034,22.034,0,0,1,35.863,38,30.7,30.7,0,0,1,27.311,36.846Z" transform="translate(-5.417 0.016)" />
                <path d="M93.952,13.779a13.069,13.069,0,0,1,5.165,5.107,15.238,15.238,0,0,1,1.823,7.631,15.232,15.232,0,0,1-1.86,7.639,13.135,13.135,0,0,1-5.165,5.107,14.743,14.743,0,0,1-7.254,1.809,11.1,11.1,0,0,1-8.6-3.414V50.834H69.8V12.386h7.918v3.261Q80.8,12,86.7,12a14.677,14.677,0,0,1,7.254,1.78ZM90.5,32.216a7.876,7.876,0,0,0,2.044-5.7A7.883,7.883,0,0,0,90.5,20.812a7.514,7.514,0,0,0-10.471,0,7.912,7.912,0,0,0-2.044,5.705,7.905,7.905,0,0,0,2.044,5.7A7.514,7.514,0,0,0,90.5,32.216Z" transform="translate(-18.294 -3.233)" />
                <path d="M124.229,39.185a13.848,13.848,0,0,1-5.608-5.173A14.074,14.074,0,0,1,116.6,26.5a14.1,14.1,0,0,1,2.022-7.515,13.9,13.9,0,0,1,5.608-5.173,18.443,18.443,0,0,1,16.175,0A13.891,13.891,0,0,1,148,26.5a13.89,13.89,0,0,1-7.593,12.68A18.443,18.443,0,0,1,124.229,39.185ZM137.556,32.2a7.905,7.905,0,0,0,2.044-5.7,7.912,7.912,0,0,0-2.044-5.705,6.947,6.947,0,0,0-5.232-2.123,7.029,7.029,0,0,0-5.261,2.123,7.84,7.84,0,0,0-2.051,5.705,7.834,7.834,0,0,0,2.073,5.7,7.029,7.029,0,0,0,5.261,2.123A6.947,6.947,0,0,0,137.556,32.2Z" transform="translate(-30.56 -3.22)" />
                <path d="M183.864,37.115a8.577,8.577,0,0,1-3,1.342,15.284,15.284,0,0,1-3.749.445q-5.092,0-7.888-2.575t-2.8-7.566V17.132H162V10.851h4.427V4h8.287v6.88h7.121v6.252h-7.121V28.659a3.832,3.832,0,0,0,.93,2.758,3.469,3.469,0,0,0,2.634.97,5.369,5.369,0,0,0,3.343-1.051Z" transform="translate(-42.459 -1.07)" />
                <path d="M8.6,79.189v9.689H25.827v6.829H8.6V109.1H0V72.36H28.107v6.829Z" transform="translate(0 -19.557)" />
                <path d="M44.5,84h8.287v28.256H44.5Z" transform="translate(-11.663 -22.705)" />
                <path d="M92.122,86.593q3.269,3.152,3.269,9.353v16.174H87.1V97.2a7.388,7.388,0,0,0-1.476-5.012,5.5,5.5,0,0,0-4.3-1.656,6.638,6.638,0,0,0-5,1.919,7.883,7.883,0,0,0-1.86,5.7v13.971h-8.3V83.843h7.918v3.3a10.964,10.964,0,0,1,4.088-2.758,14.364,14.364,0,0,1,5.365-.97A11.919,11.919,0,0,1,92.122,86.593Z" transform="translate(-17.343 -22.548)" />
                <path d="M125.926,69.34v38.973h-7.932V105.06q-3.077,3.648-8.921,3.648a14.99,14.99,0,0,1-7.305-1.787,12.827,12.827,0,0,1-5.165-5.107,16.755,16.755,0,0,1,0-15.321,12.827,12.827,0,0,1,5.165-5.107,14.99,14.99,0,0,1,7.305-1.787,10.939,10.939,0,0,1,8.552,3.414V69.34Zm-10.2,30.547a8.9,8.9,0,0,0,0-11.4,7.514,7.514,0,0,0-10.471,0,8.876,8.876,0,0,0,0,11.4,7.514,7.514,0,0,0,10.471,0Z" transform="translate(-24.833 -18.74)" />
                <path d="M174.433,100.308H152.813a6.678,6.678,0,0,0,2.76,4.151A9.249,9.249,0,0,0,161,105.984a11.086,11.086,0,0,0,3.955-.657,9.6,9.6,0,0,0,3.217-2.079l4.427,4.728q-4.029,4.574-11.806,4.574a18.773,18.773,0,0,1-8.545-1.868,13.8,13.8,0,0,1-5.741-5.173,14.139,14.139,0,0,1-2.014-7.515,14.319,14.319,0,0,1,1.992-7.485,13.9,13.9,0,0,1,5.453-5.2,17.107,17.107,0,0,1,15.385-.08,13.091,13.091,0,0,1,5.335,5.107,15.183,15.183,0,0,1,1.941,7.748C174.6,98.206,174.544,98.943,174.433,100.308Zm-19.392-9.083a6.7,6.7,0,0,0-2.332,4.3h14.079a6.778,6.778,0,0,0-2.339-4.283,7.054,7.054,0,0,0-4.678-1.561,7.2,7.2,0,0,0-4.73,1.539Z" transform="translate(-37.869 -22.553)" />
                <path d="M204.7,84.5a15.049,15.049,0,0,1,5.822-1.051v7.566q-1.38-.109-1.86-.109a7.638,7.638,0,0,0-5.579,1.97q-2.029,1.97-2.022,5.909v13.344H192.78V83.85H200.7v3.728A9.188,9.188,0,0,1,204.7,84.5Z" transform="translate(-50.527 -22.555)" />
                <path d="M59.814,70.265,54.406,67.6a6.246,6.246,0,0,0-3.944-7.342,6.362,6.362,0,0,0-7.84,3,6.218,6.218,0,0,0,2.092,8.052,6.382,6.382,0,0,0,8.334-1.1l5.438,2.67ZM44.451,67.347a3.937,3.937,0,0,1,2.509-5,4,4,0,0,1,5.058,2.482,3.937,3.937,0,0,1-2.512,5,4.011,4.011,0,0,1-5.055-2.459Z" transform="translate(-10.987 -16.178)" />
            </svg>

            <a class="navigation__hamburger-menu flex">
                <div class="navigation__hamburger-layer"></div>
                <div class="navigation__hamburger-layer"></div>
                <div class="navigation__hamburger-layer"></div>
            </a>
        </div>

        <section class="navigation flex">
            <svg class="navigation__logo" xmlns="http://www.w3.org/2000/svg" width="160" height="90" viewBox="0 0 160 90">
                <path d="M27.311,36.846a20.2,20.2,0,0,1-6.641-3.071l2.952-6.413a19.8,19.8,0,0,0,5.689,2.787A21.541,21.541,0,0,0,35.893,31.2a10.549,10.549,0,0,0,5.424-1.08,3.242,3.242,0,0,0,1.734-2.86,2.738,2.738,0,0,0-1.033-2.189,7.971,7.971,0,0,0-2.656-1.386q-1.623-.525-4.383-1.153a60.665,60.665,0,0,1-6.958-2,11.248,11.248,0,0,1-4.649-3.2,8.56,8.56,0,0,1-1.941-5.88,10.182,10.182,0,0,1,1.749-5.837A11.786,11.786,0,0,1,28.47,1.491,21.8,21.8,0,0,1,37.147,0a28.829,28.829,0,0,1,6.958.839A20.7,20.7,0,0,1,50.053,3.25L47.4,9.714A20.942,20.942,0,0,0,37.074,6.8a9.758,9.758,0,0,0-5.342,1.153A3.523,3.523,0,0,0,30,11a2.978,2.978,0,0,0,1.978,2.86,31.7,31.7,0,0,0,6.088,1.817,61.734,61.734,0,0,1,6.958,1.992,11.584,11.584,0,0,1,4.664,3.13,8.4,8.4,0,0,1,1.933,5.837,9.966,9.966,0,0,1-1.778,5.756,11.98,11.98,0,0,1-5.32,4.086A22.034,22.034,0,0,1,35.863,38,30.7,30.7,0,0,1,27.311,36.846Z" transform="translate(-5.417 0.016)" />
                <path d="M93.952,13.779a13.069,13.069,0,0,1,5.165,5.107,15.238,15.238,0,0,1,1.823,7.631,15.232,15.232,0,0,1-1.86,7.639,13.135,13.135,0,0,1-5.165,5.107,14.743,14.743,0,0,1-7.254,1.809,11.1,11.1,0,0,1-8.6-3.414V50.834H69.8V12.386h7.918v3.261Q80.8,12,86.7,12a14.677,14.677,0,0,1,7.254,1.78ZM90.5,32.216a7.876,7.876,0,0,0,2.044-5.7A7.883,7.883,0,0,0,90.5,20.812a7.514,7.514,0,0,0-10.471,0,7.912,7.912,0,0,0-2.044,5.705,7.905,7.905,0,0,0,2.044,5.7A7.514,7.514,0,0,0,90.5,32.216Z" transform="translate(-18.294 -3.233)" />
                <path d="M124.229,39.185a13.848,13.848,0,0,1-5.608-5.173A14.074,14.074,0,0,1,116.6,26.5a14.1,14.1,0,0,1,2.022-7.515,13.9,13.9,0,0,1,5.608-5.173,18.443,18.443,0,0,1,16.175,0A13.891,13.891,0,0,1,148,26.5a13.89,13.89,0,0,1-7.593,12.68A18.443,18.443,0,0,1,124.229,39.185ZM137.556,32.2a7.905,7.905,0,0,0,2.044-5.7,7.912,7.912,0,0,0-2.044-5.705,6.947,6.947,0,0,0-5.232-2.123,7.029,7.029,0,0,0-5.261,2.123,7.84,7.84,0,0,0-2.051,5.705,7.834,7.834,0,0,0,2.073,5.7,7.029,7.029,0,0,0,5.261,2.123A6.947,6.947,0,0,0,137.556,32.2Z" transform="translate(-30.56 -3.22)" />
                <path d="M183.864,37.115a8.577,8.577,0,0,1-3,1.342,15.284,15.284,0,0,1-3.749.445q-5.092,0-7.888-2.575t-2.8-7.566V17.132H162V10.851h4.427V4h8.287v6.88h7.121v6.252h-7.121V28.659a3.832,3.832,0,0,0,.93,2.758,3.469,3.469,0,0,0,2.634.97,5.369,5.369,0,0,0,3.343-1.051Z" transform="translate(-42.459 -1.07)" />
                <path d="M8.6,79.189v9.689H25.827v6.829H8.6V109.1H0V72.36H28.107v6.829Z" transform="translate(0 -19.557)" />
                <path d="M44.5,84h8.287v28.256H44.5Z" transform="translate(-11.663 -22.705)" />
                <path d="M92.122,86.593q3.269,3.152,3.269,9.353v16.174H87.1V97.2a7.388,7.388,0,0,0-1.476-5.012,5.5,5.5,0,0,0-4.3-1.656,6.638,6.638,0,0,0-5,1.919,7.883,7.883,0,0,0-1.86,5.7v13.971h-8.3V83.843h7.918v3.3a10.964,10.964,0,0,1,4.088-2.758,14.364,14.364,0,0,1,5.365-.97A11.919,11.919,0,0,1,92.122,86.593Z" transform="translate(-17.343 -22.548)" />
                <path d="M125.926,69.34v38.973h-7.932V105.06q-3.077,3.648-8.921,3.648a14.99,14.99,0,0,1-7.305-1.787,12.827,12.827,0,0,1-5.165-5.107,16.755,16.755,0,0,1,0-15.321,12.827,12.827,0,0,1,5.165-5.107,14.99,14.99,0,0,1,7.305-1.787,10.939,10.939,0,0,1,8.552,3.414V69.34Zm-10.2,30.547a8.9,8.9,0,0,0,0-11.4,7.514,7.514,0,0,0-10.471,0,8.876,8.876,0,0,0,0,11.4,7.514,7.514,0,0,0,10.471,0Z" transform="translate(-24.833 -18.74)" />
                <path d="M174.433,100.308H152.813a6.678,6.678,0,0,0,2.76,4.151A9.249,9.249,0,0,0,161,105.984a11.086,11.086,0,0,0,3.955-.657,9.6,9.6,0,0,0,3.217-2.079l4.427,4.728q-4.029,4.574-11.806,4.574a18.773,18.773,0,0,1-8.545-1.868,13.8,13.8,0,0,1-5.741-5.173,14.139,14.139,0,0,1-2.014-7.515,14.319,14.319,0,0,1,1.992-7.485,13.9,13.9,0,0,1,5.453-5.2,17.107,17.107,0,0,1,15.385-.08,13.091,13.091,0,0,1,5.335,5.107,15.183,15.183,0,0,1,1.941,7.748C174.6,98.206,174.544,98.943,174.433,100.308Zm-19.392-9.083a6.7,6.7,0,0,0-2.332,4.3h14.079a6.778,6.778,0,0,0-2.339-4.283,7.054,7.054,0,0,0-4.678-1.561,7.2,7.2,0,0,0-4.73,1.539Z" transform="translate(-37.869 -22.553)" />
                <path d="M204.7,84.5a15.049,15.049,0,0,1,5.822-1.051v7.566q-1.38-.109-1.86-.109a7.638,7.638,0,0,0-5.579,1.97q-2.029,1.97-2.022,5.909v13.344H192.78V83.85H200.7v3.728A9.188,9.188,0,0,1,204.7,84.5Z" transform="translate(-50.527 -22.555)" />
                <path d="M59.814,70.265,54.406,67.6a6.246,6.246,0,0,0-3.944-7.342,6.362,6.362,0,0,0-7.84,3,6.218,6.218,0,0,0,2.092,8.052,6.382,6.382,0,0,0,8.334-1.1l5.438,2.67ZM44.451,67.347a3.937,3.937,0,0,1,2.509-5,4,4,0,0,1,5.058,2.482,3.937,3.937,0,0,1-2.512,5,4.011,4.011,0,0,1-5.055-2.459Z" transform="translate(-10.987 -16.178)" />
            </svg>

            <nav class="navigation__nav">

                <a href="#" class="navigation__close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                    </svg>
                </a>

                <ul class="navigation__list">
                    <a href="{{ url("dashboard") }}" class="navigation__list-link @if ($page === "Dashboard") navigation__list-link--active @endif flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M20 7.093l-3-3v-2.093h3v5.093zm4 5.907h-3v10h-18v-10h-3l12-12 12 12zm-10 2h-4v6h4v-6z" />
                        </svg>

                        <li class="navigation__list-item">Home</li>
                    </a>

                    <a href="{{ url("reservate") }}" class="navigation__list-link @if ($page === "Reservate") navigation__list-link--active @endif flex">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M14 0v10l2-1.518 2 1.518v-10h4v24h-17c-1.657 0-3-1.343-3-3v-18c0-1.657 1.343-3 3-3h9zm6 20h-14.505c-1.375 0-1.375 2 0 2h14.505v-2z" />
                        </svg>

                        <li class="navigation__list-item">Reservate</li>
                    </a>

                    {{-- <a href="{{ url("live-weergave") }}" class="navigation__list-link flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M3.979 15.045c-1.468.978-2.168 2.263-2.231 3.955h-1.748c.069-2.346 1.1-4.186 3.153-5.497l.826 1.542zm15.36-14.045c-1.852 0-3.198.966-4.138 2.619l3.545 6.618c3.4.222 5.254-2.15 5.254-4.575 0-2.598-2.098-4.662-4.661-4.662zm-14.867 10.728l1.557 2.906 10.539-4.229-2.716-5.07-9.38 6.393zm4.765 3.773c.633.619.764 1.648.764 2.558v4.941h1.999v-5.097c0-1.776.662-3.024 1.735-4.207l-4.498 1.805z" />
                        </svg>

                        <li class="navigation__list-item">Live weergave</li>
                    </a>

                    <a href="{{ url("reservatie-lijst") }}" class="navigation__list-link flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19 11h-14v-2h14v2zm0 2h-14v2h14v-2zm0 4h-14v2h14v-2zm3-11v16h-20v-16h20zm2-6h-24v24h24v-24z" />
                        </svg>

                        <li class="navigation__list-item">Reservatie lijst</li>
                    </a> --}}
                </ul>
            </nav>

            <div class="navigation__buttons">
                @if(!Auth::Check())
                    <a href="{{ url('login') }}" class="btn">Sign in</a>
                    <a href="{{ url('register') }}" class="btn btn--secundary">Sign up</a>
                @else
                    <a href="{{ url('logout') }}" class="btn">Sign out</a>
                @endif
            </div>
        </section>

        @yield('content')

        <div class="indexer">
            <div class="indexer__pad">
                <nav class="indexer__nav">
                    <a href="./" class="indexer__item box flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M20 7.093l-3-3v-2.093h3v5.093zm4 5.907h-3v10h-18v-10h-3l12-12 12 12zm-10 2h-4v6h4v-6z" />
                        </svg>

                        <span>Home</span>
                    </a>

                    <a href="./" class="indexer__item box flex">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M14 0v10l2-1.518 2 1.518v-10h4v24h-17c-1.657 0-3-1.343-3-3v-18c0-1.657 1.343-3 3-3h9zm6 20h-14.505c-1.375 0-1.375 2 0 2h14.505v-2z" />
                        </svg>

                        <span>Reservate</span>
                    </a>

                    <a href="#" class="indexer__item indexer__item--odd box flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </body>

        @yield('page')

    <script>
        // Hamburger menu interaction
        document.getElementsByClassName("navigation__hamburger-menu")[0].addEventListener("click", function () {
            if (document.body.classList.contains("body--side-nav--active")) document.body.classList.remove("body--side-nav--active");
            else document.body.classList.add("body--side-nav--active");
        });

        // Navigation (mobile) close button
        document.getElementsByClassName("navigation__close")[0].addEventListener("click", function () {
            document.body.classList.remove("body--side-nav--active");
        });

        // Finder-section (mobile) closing
        document.getElementsByClassName("finder__close")[0].addEventListener("click", finderCollapse);

        // Finder-section (desktop) closing
        document.getElementsByClassName("finder__collapse")[0].addEventListener("click", finderCollapse);

        function finderCollapse () {
            if (document.body.classList.contains("body--active-finder")) document.body.classList.remove("body--active-finder");
            else document.body.classList.add("body--active-finder");
        }
    </script>
    <script src="{{ url("js/".strtolower($page).".js") }}"></script>
@endsection
