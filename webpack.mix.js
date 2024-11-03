const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').vue();
mix.js('resources/js/app_frontend.js', 'public/js').vue();
mix.sass('resources/css/app.scss', 'public/css');
