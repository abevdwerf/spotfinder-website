@extends("odd-layout")

@section("content")
        <div class="lava-circle__wrapper flex">
            <div class="login box flex">
                <div class="login__wrapper">
                    <img class="login__logo" src="{{ url('img/logo.svg') }}" alt="SpotFinder logo">

                    <h1 class="h2">Sign in</h1>

                    <form class="form login__form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form__input-wrapper">
                            <label class="form__label" for="login-username">Username</label>
                            <input class="form__input" type="text" id="login-username" name="login_name" value="{{ old('name') ?: old('email') }}" placeholder="Username">
                        </div>

                        <div class="form__input-wrapper">
                            <label class="form__label" for="login-password">Password</label>
                            <input class="form__input" type="password" id="login-password" name="password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form__input-wrapper form__input-wrapper--submit">
                            <input class="btn" type="submit" value="Sign in">
                        </div>
                    </form>

                    <div class="login__divider">
                        <div class="login__divider-line"></div>
                        <span class="login__divider-text">Or</span>
                    </div>

                    <p class="login__register">
                        Sign up <a href="{{ route('register') }}">here</a> to create an account.
                    </p>
                </div>

                <div class="login__banner flex">
                    <img class="login__illustration" src="{{ url('img/worker-illustration.svg') }}" alt="Illustration of a working person">

                    <h2 class="h1">SpotFinder</h2>

                    <p>
                        SpotFinder is an service which helps you find a available workplace. With our website you can
                        search for workplaces and reserve rooms. With our management-application you can create, add and
                        delete rooms and define all workspaces that will be shown on the website.
                    </p>
                </div>
            </div>
        </div>
@endsection