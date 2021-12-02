@extends("odd-layout")

@section("content")
    <div class="register box flex">
        <div class="register__wrapper">
            <h1 class="h2">Registreren</h1>

            <form class="form register__form" action="./" method="post">
                <div class="form__input-wrapper">
                    <label class="form__label" for="register-username">Gebruikersnaam</label>
                    <input class="form__input" type="text" id="register-username" placeholder="Gebruikersnaam" required>
                </div>

                <div class="form__input-wrapper">
                    <label class="form__label" for="register-username">E-mailadres</label>
                    <input class="form__input" type="email" id="register-username" placeholder="E-mailadres" required>
                </div>

                <div class="form__input-wrapper">
                    <label class="form__label" for="register-password">Wachtwoord</label>
                    <input class="form__input" type="password" id="register-password" placeholder="Wachtwoord" required>
                </div>

                <div class="form__input-wrapper">
                    <label class="form__label" for="register-password-repeat">Wachtwoord herhalen</label>
                    <input class="form__input" type="password" id="register-password-repeat" placeholder="Wachtwoord herhalen" required>
                </div>

                <div class="form__input-wrapper form__input-wrapper--full-width">
                    <p style="margin-bottom: 3rem;">
                        <b>
                            Let op: 
                        </b>

                        We zullen een verificatie-mail versturen naar uw e-mailadres. <br/>
                        Hou dus goed je mailbox van je e-mailadres in de gaten.
                    </p>

                    <div class="form__checkbox-wrapper flex">
                        <input type="checkbox" id="register-location-updates">
                        <div class="form__checkbox flex"></div>
                        <label for="register-location-updates" class="form__checkbox-label">Ik wil graag <a href="./location-updates.html" target="_blank">locatie-updates</a> ontvangen.</label>
                    </div>

                    <div class="form__checkbox-wrapper flex">
                        <input type="checkbox" id="register-service-details">
                        <div class="form__checkbox flex"></div>
                        <label for="register-service-details" class="form__checkbox-label" required>Ik ga akkoord met de <a href="./service-details.html" target="_blank">service-voorwaarden</a>.</label>
                    </div>
                </div>

                <div style="margin-top: 1rem;" class="form__input-wrapper form__input-wrapper--full-width form__input-wrapper--submit">
                    <input class="btn" type="submit" value="Account aanmaken">
                </div>
            </form>

            <div class="register__divider">
                <div class="register__divider-line"></div>
                <span class="register__divider-text">Of</span>
            </div>

            <p class="register__login">
                Ik heb al een account en wil graag <a href="{{ url('login') }}">inloggen</a>.
            </p>
        </div>

        <div class="register__banner flex">
            <img class="register__illustration" src="{{ url('img/detective-illustration.svg') }}" alt="Illustration of a working person">
        
            <h2 class="h1">SpotFinder</h2>
        
            <p>
                Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de
                standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak
                met letters nam en ze door elkaar husselde om een font-catalogus te maken.
            </p>
        </div>
    </div>
@endsection