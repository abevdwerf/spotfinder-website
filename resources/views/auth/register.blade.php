@extends("odd-layout")

@section("content")
        <div class="lava-circle__wrapper flex">
            <div class="register box flex">
                <div class="register__wrapper">
                    <h1 class="h2">Sign up</h1>

                    <form class="form register__form" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form__input-wrapper">
                            <label class="form__label" for="register-username">Username</label>
                            <input class="form__input" type="text" id="register-username" name="name" placeholder="Username" value="{{ old('name') }}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form__input-wrapper">
                            <label class="form__label" for="register-username">E-mail address</label>
                            <input class="form__input" type="email" id="register-username" name="email" placeholder="E-mail address" value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form__input-wrapper">
                            <label class="form__label" for="register-password">Password</label>
                            <input class="form__input" type="password" id="register-password" name="password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form__input-wrapper">
                            <label class="form__label" for="register-password-repeat">Confirm password</label>
                            <input class="form__input" type="password" id="register-password-repeat" name="password_confirmation" placeholder="Confirm password">
                        </div>

                        <div class="form__input-wrapper form__input-wrapper--full-width">
                            <p style="margin-bottom: 3rem;">
                                <b>
                                    Pay attention:
                                </b>

                                We will send a verification email to your email address. <br/>
                                So keep an eye on your mailbox of your e-mail address.
                            </p>

                            <div class="form__checkbox-wrapper flex">
                                <input type="checkbox" id="register-location-updates" >
                                <div class="form__checkbox flex"></div>
                                <label for="register-location-updates" class="form__checkbox-label">I would like to receive <a href="../location-updates.html" target="_blank">location updates</a>.</label>
                            </div>

                            <div class="form__checkbox-wrapper flex">
                                <input type="checkbox" id="register-service-details" name="service-conditions" {{ old('service-conditions') ? 'checked' : ''}}>
                                <div class="form__checkbox flex"></div>
                                <label for="register-service-details" class="form__checkbox-label">I agree with the <a href="../service-details.html" target="_blank">service conditions</a>.</label>

                                @error('service-conditions')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div style="margin-top: 1rem;" class="form__input-wrapper form__input-wrapper--full-width form__input-wrapper--submit">
                            <input class="btn" type="submit" value="Sign up">
                        </div>
                    </form>

                    <div class="register__divider">
                        <div class="register__divider-line"></div>
                        <span class="register__divider-text">Or</span>
                    </div>

                    <p class="register__login">
                        I already have an account and would like to <a href="{{ route('login') }}">Sign in</a>.
                    </p>
                </div>

                <div class="register__banner flex">
                    <img class="register__illustration" src="{{url('img/detective-illustration.svg')}}" alt="Illustration of a working person">

                    <h2 class="h1">SpotFinder</h2>

                    <p>
                        Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de
                        standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak
                        met letters nam en ze door elkaar husselde om een font-catalogus te maken.
                    </p>
                </div>
            </div>
@endsection
