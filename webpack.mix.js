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

mix
    .babel([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
        'bower_components/raphael/raphael.min.js',
        'bower_components/morris.js/morris.min.js',
        'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.js',
        'bower_components/jquery-knob/js/jquery.knob.js',
        'resources/assets/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'resources/assets/jvectormap/jquery-jvectormap-world-mill-en.js',
        'bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'node_modules/jquery-validation/dist/jquery.validate.min.js',
        'bower_components/jquery-ui/jquery-ui.js',
        'resources/assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js',
        'node_modules/moment/moment.js',
        "resources/assets/iCheck/icheck.js",
        'node_modules/sweetalert2/dist/sweetalert2.js',
        'node_modules/toastr/build/toastr.min.js',
        'resources/assets/js/loader.js',
        'resources/assets/js/adminlte.js',
        'resources/assets/js/dashboard.js',
        'resources/assets/js/demo.js',
        'resources/assets/js/app.js'
    ], 'public/js/app.js')
    .babel([
        'resources/assets/js/auth/register.js'
    ], 'public/js/register.js')
    .babel([
        'resources/assets/js/auth/reset-password.js'
    ], 'public/js/reset-password.js')
    .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .version();

mix.disableNotifications();
