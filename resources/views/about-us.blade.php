@extends('layout')

@section('content')
    <main class="about-us" style="margin-left: 0;">
        <h1 class="h1" style="margin-bottom: 1.5rem;">About us</h1>

        <p>
            Spotfinder is a service that helps users to find a suitable and available workplace in an office- or schoolbuilding. The available workspaces of specific locations will be monitored and displayed on the website. You can then use this website to reserve workspaces and search for available workspaces. Besides the website can use the management-application to create, edit or delete rooms and define the available workspaces.
        </p>

        <img class="about-us__image" src="./img/group-photo.jpg" alt="Group-photo of SpotFinder">

        <div class="flex" style="flex-wrap: wrap; padding-bottom: 5rem;">
            <img style="max-height: 30.4rem; margin-right: 2.5rem;" src="{{ url('img/application-preview.jpg') }}" alt="Preview of application">
            <img style="max-height: 30.4rem;" src="{{ url('img/website-preview-mobile.jpg') }}" alt="Illustration of an detective">
        </div>
    </main>
@endsection