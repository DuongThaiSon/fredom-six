const mix = require("laravel-mix");

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

mix.js("resources/js/admin/main.js", "public/assets/admin/js")
    .js("resources/js/admin/gallery.edit.js", "public/assets/admin/js")
    .sass("resources/sass/admin/main.scss", "public/assets/admin/css")
    .copy('node_modules/bootstrap-select/dist/css/bootstrap-select.min.css', 'public/assets/admin/css/bootstrap-select.min.css')
    .copy('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css', 'public/assets/admin/css/filepond-plugin-image-preview.min.css')
    .copy('node_modules/filepond/dist/filepond.min.css', 'public/assets/admin/css/filepond.min.css');
