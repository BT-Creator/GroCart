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
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));
mix.sass('resources/sass/themes/universal.scss', 'public/assets/css/universal.css')
    .sass('resources/sass/themes/neutral.scss', 'public/assets/css/neutral.css')
    .sass('resources/sass/consumer/lists.scss', 'public/assets/css/consumer/lists.css')
    .sass('resources/sass/consumer/list-mod.scss', 'public/assets/css/consumer/list-mod.scss')
    .sass('resources/sass/consumer/order.scss', 'public/assets/css/consumer/order.css')
    .sass('resources/sass/consumer/profile.scss', 'profile/assets/css/consumer/profile.css');
