@extends('layout')

@section('content')
    <main style="margin-left: 0; max-width: 90rem;">
        <h1 class="h1" style="margin-bottom: 1.5rem;">About us</h1>

        <p>
            Spotfinder is a service that helps users to find a suitable and available workplace in an office- or schoolbuilding. The available workspaces of specific locations will be monitored and displayed on the website. You can then use this website to reserve workspaces and search for available workspaces. Besides the website can use the management-application to create, edit or delete rooms and define the available workspaces.
        </p>

        <div class="flex" style="flex-wrap: wrap; margin-top: 5rem;">
            <img style="max-height: 30.4rem; margin-right: 2.5rem;" src="{{ url('img/application-preview.jpg') }}" alt="Preview of application">
            <img style="max-height: 30.4rem;" src="{{ url('img/website-preview-mobile.jpg') }}" alt="Illustration of an detective">
        </div>
    </main>
@endsection