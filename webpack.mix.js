const mix = require('laravel-mix');

mix
    // .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/styles.sass', 'public/css')
    .disableNotifications()
    .options({
        processCssUrls: false
    });