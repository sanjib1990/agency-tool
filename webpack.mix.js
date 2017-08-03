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
        'node_modules/blueimp-file-upload/js/vendor/jquery.ui.widget.js',
        'node_modules/blueimp-file-upload/js/jquery.fileupload.js',
        "resources/assets/iCheck/icheck.js",
        'node_modules/sweetalert2/dist/sweetalert2.js',
        'node_modules/toastr/build/toastr.min.js',
        'bower_components/PACE/pace.js',
        'resources/assets/js/loader.js',
        'resources/assets/js/adminlte.js',
        'resources/assets/js/base64.js',
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
    .babel([
        'node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.js'
    ], 'public/js/jquery.easy-autocomplete.js')
    .styles([
        'node_modules/easy-autocomplete/dist/easy-autocomplete.css'
    ], 'public/css/project.css')
    .babel([
        'node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.js',
        'resources/assets/js/project.js'
    ], 'public/js/project.js')
    .babel([
        'resources/assets/js/home.js'
    ], 'public/js/home.js')
    .styles([
        'node_modules/easy-autocomplete/dist/easy-autocomplete.css',
        'resources/assets/css/project.css'
    ], 'public/css/project.css')
    .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .copy('resources/assets/img/*', 'public/images/')
    .version();

// mix.disableNotifications();
