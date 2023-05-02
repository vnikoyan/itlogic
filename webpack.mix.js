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
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/product.js', 'public/js')
    .js('resources/js/basket.js', 'public/js')
    .copyDirectory('resources/img', 'public/img')
    .copyDirectory('resources/font', 'public/font')
    .sass('resources/scss/main.scss', 'public/css');
