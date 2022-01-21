@extends('layout')

@section('content')
    <main style="margin-left: 0; max-width: 120rem;">
        <h1 class="h1" style="margin-bottom: 1.5rem;">Contact</h1>

        <p>
            Would you like to <b>report a bug</b> to the developers of Spotfinder? <br /> Or would you like to <b>enroll this service on a location that is owned by you</b>? <br /> Or maybe you just want to <b>compliment our service</b>? <br /> Then you can contact the developers of SpotFinder trough the following contact-form.
        </p>

        <div class="form__box">
            <form method="post" action="{{ url('contact') }}" class="form">
                {{ csrf_field() }}

                <div class="form__input-wrapper form__input-wrapper--half">
                    <span class="form__label">Full name</span>
                    <input type="text" class="form__input" name="name" placeholder="Full name" required>
                </div>
    
                <div class="form__input-wrapper form__input-wrapper--half">
                    <span class="form__label">E-mailadres</span>
                    <input type="email" class="form__input" name="email" placeholder="E-mailadres" required>
                </div>
    
                <div class="form__input-wrapper">
                    <span class="form__label">Subject</span>
                    <input type="text" class="form__input" name="subject" placeholder="Reason for contact" required>
                </div>
    
                <div class="form__input-wrapper">
                    <span class="form__label">Message</span>
                    <textarea class="form__input" name="message" placeholder="Message..." required></textarea>
                </div>

                <div class="form__input-wrapper">
                    <input class="btn" type="submit" value="Contact opnemen">
                </div>
            </form>
        </div>
    </main>
@endsection