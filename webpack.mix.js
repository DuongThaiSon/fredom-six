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
    .js("resources/js/admin/galleries.edit.js", "public/assets/admin/js")
    .js("resources/js/admin/products.edit.js", "public/assets/admin/js")
    .js("resources/js/admin/productCats.edit.js", "public/assets/admin/js")
    .js("resources/js/admin/backups.index.js", "public/assets/admin/js")
    .js("resources/js/admin/backups.import.js", "public/assets/admin/js")
    .js("resources/js/client/products.detail.js", "public/assets/client/js")
    .js("resources/js/admin/product-attributes.create.js", "public/assets/admin/js")
    .js("resources/js/admin/articles.index.js", "public/assets/admin/js")
    .js("resources/js/admin/videos.index.js", "public/assets/admin/js")
    .js("resources/js/admin/articleCats.index.js", "public/assets/admin/js")
    .js("resources/js/admin/productCats.index.js", "public/assets/admin/js")
    .js("resources/js/admin/galleryCats.index.js", "public/assets/admin/js")
    .js("resources/js/admin/videoCats.index.js", "public/assets/admin/js")
    .js("resources/js/admin/components.index.js", "public/assets/admin/js")
    .js("resources/js/admin/contacts.index.js", "public/assets/admin/js")
    .js("resources/js/admin/menus.index.js", "public/assets/admin/js")
    .js("resources/js/admin/menus.edit.js", "public/assets/admin/js")
    .js("resources/js/admin/menus.create.js", "public/assets/admin/js")
    .js("resources/js/admin/settings.index.js", "public/assets/admin/js")
    .js("resources/js/admin/sitemap.index.js", "public/assets/admin/js")
    .js("resources/js/admin/users.admins.index.js", "public/assets/admin/js")
    .js("resources/js/admin/users.admins.create.js", "public/assets/admin/js")
    .js("resources/js/admin/users.members.index.js", "public/assets/admin/js")
    .js("resources/js/admin/users.members.create.js", "public/assets/admin/js")
    .js("resources/js/admin/users.profile.edit.js", "public/assets/admin/js")
    .sass("resources/sass/admin/main.scss", "public/assets/admin/css")
    .copy('node_modules/bootstrap-select/dist/css/bootstrap-select.min.css', 'public/assets/admin/css/bootstrap-select.min.css')
    .copy('node_modules/jasny-bootstrap/dist/css/jasny-bootstrap.min.css', 'public/assets/admin/css/jasny-bootstrap.min.css')
    .copy('node_modules/flatpickr/dist/flatpickr.min.css', 'public/assets/admin/css/flatpickr.min.css')
    .copy('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css', 'public/assets/admin/css/filepond-plugin-image-preview.min.css')
    .copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/assets/admin/vendor/fontawesome/css/all.min.css')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/assets/admin/vendor/fontawesome/webfonts')
    .copy('node_modules/croppie/croppie.css', 'public/assets/admin/css/croppie.css')
    .copy('node_modules/filepond/dist/filepond.min.css', 'public/assets/admin/css/filepond.min.css')
    .copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/assets/admin/css/dataTables.bootstrap4.min.css')
    .webpackConfig({
        resolve: {
            alias: {
                "bootstrap": path.resolve(__dirname, "node_modules/bootstrap/dist/js/bootstrap.min.js"),
            }
        }
    });
