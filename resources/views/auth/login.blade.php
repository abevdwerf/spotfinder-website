@extends("odd-layout")

@section("content")
    <body class="body body__center-content">
        <div class="lava-circle__wrapper flex">
            <div class="login box flex">
                <div class="login__wrapper">
                    <img class="login__logo" src="{{ url('img/logo.svg') }}" alt="SpotFinder logo">

                    <h1 class="h2">Inloggen</h1>

                    <form class="form login__form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form__input-wrapper">
                            <label class="form__label" for="login-username">Gebruikersnaam</label>
                            <input class="form__input" type="text" id="login-username" name="login_name" value="{{ old('name') ?: old('email') }}" placeholder="Gebruikersnaam">
                        </div>

                        <div class="form__input-wrapper">
                            <label class="form__label" for="login-password">Wachtwoord</label>
                            <input class="form__input" type="password" id="login-password" name="password" placeholder="Wachtwoord">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form__input-wrapper form__input-wrapper--submit">
                            <input class="btn" type="submit" value="Inloggen">
                        </div>
                    </form>

                    <div class="login__divider">
                        <div class="login__divider-line"></div>
                        <span class="login__divider-text">Of</span>
                    </div>

                    <p class="login__register">
                        Registreer <a href="{{ route('register') }}">hier</a> om een account aan te maken.
                    </p>
                </div>

                <div class="login__banner flex">
                    <img class="login__illustration" src="{{ url('img/worker-illustration.svg') }}" alt="Illustration of a working person">

                    <h2 class="h1">SpotFinder</h2>

                    <p>
                        Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de
                        standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak
                        met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen
                        vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting.
                    </p>
                </div>
            </div>
@endsection
