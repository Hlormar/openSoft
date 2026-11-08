const mix = require('laravel-mix');

mix.js('resources/js/main.js', 'public/js')
   .js('resources/js/app.js', 'public/js')
   .sass('resources/sass/style.scss', 'public/css');