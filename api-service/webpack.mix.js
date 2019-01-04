const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Frontend
mix.js('resources/js/frontend.js', 'public/js/frontend.js')
   .sass('resources/sass/frontend.scss', 'public/css/frontend.css');

// Backend
mix.js('resources/js/backend.js', 'public/js/backend.js')
   .sass('resources/sass/backend.scss', 'public/css/backend.css');


