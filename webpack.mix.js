const mix = require('laravel-mix');

mix
    .js('resources/js/dashboard.js', 'public/js')
    .js('resources/js/reservate.js', 'public/js')
    .sass('resources/sass/styles.sass', 'public/css')
    .disableNotifications()
    .options({
        processCssUrls: false
    });