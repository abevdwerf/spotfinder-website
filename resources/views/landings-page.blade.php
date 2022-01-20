@extends("base")

@section("page")
    <body class="body body--purple-back">
        <header class="header">
            <div class="container flex">
                <a href="{{ url('dashboard') }}" class="header__logo"> <svg class="header__logo" xmlns="http://www.w3.org/2000/svg" width="160" height="90" viewBox="0 0 160 90"> <path d="M27.311,36.846a20.2,20.2,0,0,1-6.641-3.071l2.952-6.413a19.8,19.8,0,0,0,5.689,2.787A21.541,21.541,0,0,0,35.893,31.2a10.549,10.549,0,0,0,5.424-1.08,3.242,3.242,0,0,0,1.734-2.86,2.738,2.738,0,0,0-1.033-2.189,7.971,7.971,0,0,0-2.656-1.386q-1.623-.525-4.383-1.153a60.665,60.665,0,0,1-6.958-2,11.248,11.248,0,0,1-4.649-3.2,8.56,8.56,0,0,1-1.941-5.88,10.182,10.182,0,0,1,1.749-5.837A11.786,11.786,0,0,1,28.47,1.491,21.8,21.8,0,0,1,37.147,0a28.829,28.829,0,0,1,6.958.839A20.7,20.7,0,0,1,50.053,3.25L47.4,9.714A20.942,20.942,0,0,0,37.074,6.8a9.758,9.758,0,0,0-5.342,1.153A3.523,3.523,0,0,0,30,11a2.978,2.978,0,0,0,1.978,2.86,31.7,31.7,0,0,0,6.088,1.817,61.734,61.734,0,0,1,6.958,1.992,11.584,11.584,0,0,1,4.664,3.13,8.4,8.4,0,0,1,1.933,5.837,9.966,9.966,0,0,1-1.778,5.756,11.98,11.98,0,0,1-5.32,4.086A22.034,22.034,0,0,1,35.863,38,30.7,30.7,0,0,1,27.311,36.846Z" transform="translate(-5.417 0.016)" /> <path d="M93.952,13.779a13.069,13.069,0,0,1,5.165,5.107,15.238,15.238,0,0,1,1.823,7.631,15.232,15.232,0,0,1-1.86,7.639,13.135,13.135,0,0,1-5.165,5.107,14.743,14.743,0,0,1-7.254,1.809,11.1,11.1,0,0,1-8.6-3.414V50.834H69.8V12.386h7.918v3.261Q80.8,12,86.7,12a14.677,14.677,0,0,1,7.254,1.78ZM90.5,32.216a7.876,7.876,0,0,0,2.044-5.7A7.883,7.883,0,0,0,90.5,20.812a7.514,7.514,0,0,0-10.471,0,7.912,7.912,0,0,0-2.044,5.705,7.905,7.905,0,0,0,2.044,5.7A7.514,7.514,0,0,0,90.5,32.216Z" transform="translate(-18.294 -3.233)" /> <path d="M124.229,39.185a13.848,13.848,0,0,1-5.608-5.173A14.074,14.074,0,0,1,116.6,26.5a14.1,14.1,0,0,1,2.022-7.515,13.9,13.9,0,0,1,5.608-5.173,18.443,18.443,0,0,1,16.175,0A13.891,13.891,0,0,1,148,26.5a13.89,13.89,0,0,1-7.593,12.68A18.443,18.443,0,0,1,124.229,39.185ZM137.556,32.2a7.905,7.905,0,0,0,2.044-5.7,7.912,7.912,0,0,0-2.044-5.705,6.947,6.947,0,0,0-5.232-2.123,7.029,7.029,0,0,0-5.261,2.123,7.84,7.84,0,0,0-2.051,5.705,7.834,7.834,0,0,0,2.073,5.7,7.029,7.029,0,0,0,5.261,2.123A6.947,6.947,0,0,0,137.556,32.2Z" transform="translate(-30.56 -3.22)" /> <path d="M183.864,37.115a8.577,8.577,0,0,1-3,1.342,15.284,15.284,0,0,1-3.749.445q-5.092,0-7.888-2.575t-2.8-7.566V17.132H162V10.851h4.427V4h8.287v6.88h7.121v6.252h-7.121V28.659a3.832,3.832,0,0,0,.93,2.758,3.469,3.469,0,0,0,2.634.97,5.369,5.369,0,0,0,3.343-1.051Z" transform="translate(-42.459 -1.07)" /> <path d="M8.6,79.189v9.689H25.827v6.829H8.6V109.1H0V72.36H28.107v6.829Z" transform="translate(0 -19.557)" /> <path d="M44.5,84h8.287v28.256H44.5Z" transform="translate(-11.663 -22.705)" /> <path d="M92.122,86.593q3.269,3.152,3.269,9.353v16.174H87.1V97.2a7.388,7.388,0,0,0-1.476-5.012,5.5,5.5,0,0,0-4.3-1.656,6.638,6.638,0,0,0-5,1.919,7.883,7.883,0,0,0-1.86,5.7v13.971h-8.3V83.843h7.918v3.3a10.964,10.964,0,0,1,4.088-2.758,14.364,14.364,0,0,1,5.365-.97A11.919,11.919,0,0,1,92.122,86.593Z" transform="translate(-17.343 -22.548)" /> <path d="M125.926,69.34v38.973h-7.932V105.06q-3.077,3.648-8.921,3.648a14.99,14.99,0,0,1-7.305-1.787,12.827,12.827,0,0,1-5.165-5.107,16.755,16.755,0,0,1,0-15.321,12.827,12.827,0,0,1,5.165-5.107,14.99,14.99,0,0,1,7.305-1.787,10.939,10.939,0,0,1,8.552,3.414V69.34Zm-10.2,30.547a8.9,8.9,0,0,0,0-11.4,7.514,7.514,0,0,0-10.471,0,8.876,8.876,0,0,0,0,11.4,7.514,7.514,0,0,0,10.471,0Z" transform="translate(-24.833 -18.74)" /> <path d="M174.433,100.308H152.813a6.678,6.678,0,0,0,2.76,4.151A9.249,9.249,0,0,0,161,105.984a11.086,11.086,0,0,0,3.955-.657,9.6,9.6,0,0,0,3.217-2.079l4.427,4.728q-4.029,4.574-11.806,4.574a18.773,18.773,0,0,1-8.545-1.868,13.8,13.8,0,0,1-5.741-5.173,14.139,14.139,0,0,1-2.014-7.515,14.319,14.319,0,0,1,1.992-7.485,13.9,13.9,0,0,1,5.453-5.2,17.107,17.107,0,0,1,15.385-.08,13.091,13.091,0,0,1,5.335,5.107,15.183,15.183,0,0,1,1.941,7.748C174.6,98.206,174.544,98.943,174.433,100.308Zm-19.392-9.083a6.7,6.7,0,0,0-2.332,4.3h14.079a6.778,6.778,0,0,0-2.339-4.283,7.054,7.054,0,0,0-4.678-1.561,7.2,7.2,0,0,0-4.73,1.539Z" transform="translate(-37.869 -22.553)" /> <path d="M204.7,84.5a15.049,15.049,0,0,1,5.822-1.051v7.566q-1.38-.109-1.86-.109a7.638,7.638,0,0,0-5.579,1.97q-2.029,1.97-2.022,5.909v13.344H192.78V83.85H200.7v3.728A9.188,9.188,0,0,1,204.7,84.5Z" transform="translate(-50.527 -22.555)" /> <path d="M59.814,70.265,54.406,67.6a6.246,6.246,0,0,0-3.944-7.342,6.362,6.362,0,0,0-7.84,3,6.218,6.218,0,0,0,2.092,8.052,6.382,6.382,0,0,0,8.334-1.1l5.438,2.67ZM44.451,67.347a3.937,3.937,0,0,1,2.509-5,4,4,0,0,1,5.058,2.482,3.937,3.937,0,0,1-2.512,5,4.011,4.011,0,0,1-5.055-2.459Z" transform="translate(-10.987 -16.178)" /> </svg> </a>

                <ul class="header__list">
                    <a href="{{ url('dashboard') }}" class="header__list-item">Webapplication</a>
                    <a href="{{ url('about-us') }}" class="header__list-item">Over ons</a>
                    <a href="{{ url('contact') }}" class="header__list-item">Contact</a>
                    <a href="{{ url('login') }}" class="header__list-item btn">Login</a>
                    <a href="{{ url('register') }}" class="header__list-item btn btn--secundary">Register</a>
                </ul>

                <img class="header__illustration" src="{{ url('img/worker-illustration.svg') }}" alt="Illustration of an working employee">
            </div>
        </header>

        <main>
            <div class="lava-circle__wrapper">
                <section class="intro">
                    <div class="container">
                        <div class="box box--large flex">
                            <img class="intro__image" src="{{ url('img/detective-illustration.svg') }}" alt="Illustration of an detective">
        
                            <div class="intro__content">
                                <h1 class="h1">Find your perfect workspace</h1>
                                <p>
                                    Spotfinder is a web-service which will help you find your ideal working-envoirement.
                                    If Spotfinder is integrated in your office or school-building then the available workplaces will be shown on the <a href="{{ url('dashboard')}}">webapplication</a>.
                                    You can easily find a workspace that fits your needs by applying filters to the search-result. It is also possible to reserve a specific room beforehand.
                                </p>
                                <a href="{{ url('dashboard') }}" class="btn">Use SpotFinder</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="lava-circles lava-circles--low-opacity">
                        <div class="lava-circle"></div>
                        <div class="lava-circle"></div>
                        <div class="lava-circle"></div>
                        <div class="lava-circle"></div>
                    </div>
                </section>
            </div>

            <section class="information">
                <div class="container flex">
                    <div class="information__images">
                        <img src="{{ url('img/application-preview.jpg') }}" alt="Preview of application">
                    </div>

                    <div class="information__content">
                        <h2 class="h1">Manage your location with our application</h2>
                        <p>
                            Spotfinder comes with a userfriendly application in which your location-manager can update your location-floors and rooms.
                            All the reservations of a specific location are shown in the application and you can easily refuse upcoming reservations.
                            Besidese those useful functionalities you also can view statistics about your location(s).
                        </p>
                        <a href="{{ url('download') }}" target="_blank" class="btn btn--thirdiary">Download application</a>
                    </div>
                </div>
            </section>

            <div class="lava-circle__wrapper lava-circle__wrapper--no-background">
                <section class="advantages">
                    <div class="container">
                        <div class="box box--large flex">
                            <div class="advantages__image flex">
                                <img src="{{ url('img/website-preview-mobile.jpg') }}" alt="Illustration of an detective">
                            </div>

                            <div class="advantages__content">
                                <h1 class="h1">Easy to use web-app</h1>
                                <p>
                                    The <a href="{{ url('dashboard') }}">webapplication</a> which employees and students will use to find a workspace is user-friendly and easy-to-use.
                                    The webapplication is also very accessible for all sort of smart devices such as laptops, tablets and smart-phones.
                                    Click on the button below this text to navigate to the <a href="{{ url('dashboard') }}">dashboard</a> of the webapplication.
                                </p>
                                <a href="{{ url('dashboard') }}" class="btn">Go to Spotfinder</a>
                            </div>
                        </div>
                    </div>

                    <div class="lava-circles lava-circles--yellow">
                        <div class="lava-circle"></div>
                        <div class="lava-circle"></div>
                        <div class="lava-circle"></div>
                        <div class="lava-circle"></div>
                    </div>
                </section>
            </div>
        </main>
    </body>
@endsection