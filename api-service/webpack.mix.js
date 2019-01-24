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
// mix.scripts([
//       'resources/js/backend.js',
//       'node_modules/switchery/switchery.js',
//       ], 'public/js/backend.js')
//    .styles([
//       'resources/sass/backend.scss',
//       'node_modules/switchery/switchery.css',
//       ], 'public/css/backend.css');



