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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .js('resources/js/home.js', 'public/js')
   .sass('resources/sass/home.scss', 'public/css')
   .js('resources/js/dashboard.js', 'public/js')
   .sass('resources/sass/dashboard.scss', 'public/css');

let jsPath = 'public/js';
mix.copy('node_modules/tinymce/skins', jsPath + '/skins');