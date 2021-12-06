<!DOCTYPE html>
<html class="html--scale-based" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/site.webmanifest">
        <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#a200ff">
        <meta name="msapplication-TileColor" content="#a200ff">
        <meta name="theme-color" content="#a200ff">

        <!-- Title -->
        <title>Spotfinder | {{ $page }}</title>

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ url('css/styles.css') }}">
    </head>

    @yield('page')
    
</html>