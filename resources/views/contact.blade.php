@extends('layout')

@section('content')
    <main style="margin-left: 0;">
        <h1 class="h1" style="margin-bottom: 1.5rem;">Contact</h1>

        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur reprehenderit voluptatem sequi, enim autem
            sed vero corrupti voluptatum quasi fugit veritatis tempora in dicta suscipit possimus pariatur vitae inventore
            minima delectus voluptatibus, voluptate similique ad itaque.
        </p>

        <div class="form__box">
            <form method="post" action="{{ url('contact') }}" class="form">
                {{ csrf_field() }}

                <div class="form__input-wrapper form__input-wrapper--half">
                    <span class="form__label">Volledige naam</span>
                    <input type="text" class="form__input" name="name" placeholder="Volledige naam" required>
                </div>
    
                <div class="form__input-wrapper form__input-wrapper--half">
                    <span class="form__label">E-mailadres</span>
                    <input type="email" class="form__input" name="email" placeholder="E-mailadres" required>
                </div>
    
                <div class="form__input-wrapper">
                    <span class="form__label">Onderwerp</span>
                    <input type="text" class="form__input" name="subject" placeholder="Reden tot contact" required>
                </div>
    
                <div class="form__input-wrapper">
                    <span class="form__label">Bericht</span>
                    <textarea class="form__input" name="message" placeholder="Bericht..." required></textarea>
                </div>

                <div class="form__input-wrapper">
                    <input class="btn" type="submit" value="Contact opnemen">
                </div>
            </form>
        </div>
    </main>
@endsection