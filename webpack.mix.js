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
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('resources/templates', 'public'); 
mix.copy('resources/lang', 'public/lang'); 


mix.copy('resources/images', 'public/images'); 
mix.copy('resources/soundEffects', 'public/soundEffects'); 


mix.copy('resources/css', 'public/css'); 

mix.copy('resources/js/ride-create.js', 'public/js'); 
mix.copy('resources/js/rides.js', 'public/js'); 
mix.copy('resources/js/ride-information.js', 'public/js'); 
mix.copy('resources/js/user-settings.js', 'public/js'); 
mix.copy('resources/js/user-blade.js', 'public/js'); 
mix.copy('resources/js/top-menu.js', 'public/js'); 




mix.copy('resources/js/passangerSugested.js', 'public/js');

mix.copy('resources/js/passanger.js', 'public/js');




