const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue(3)
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .extract() // extracts vendor files into their own files when mix is run so vendor files can be cached longer than the app js file since those don't change as often
    .version();
