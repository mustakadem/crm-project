let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/ajaxCalls.js','public/js')
    .js('resources/assets/js/statistics.js','public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles(['node_modules/izimodal/css/iziModal.min.css'],'public/css/iziModal.min.css')
    .babel('node_modules/izimodal/js/iziModal.min.js',"public/js/iziModal.min.js")
    .js('resources/assets/js/modal.js','public/js');

mix.babel('node_modules/multi.js/dist/multi.min.js','public/js/multi.min.js')
    .styles(['node_modules/multi.js/dist/multi.min.css'],'public/css/multi.min.css');

mix.babel('node_modules/chart.js/dist/Chart.bundle.min.js','public/js/chart.min.js')
    .js('resources/assets/js/select.js','public/js');