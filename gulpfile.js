const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;

var tmp = {};
var pub = {};

var shared = {
    js: "./resources/assets/js/",
    css: "./resources/assets/css/",
};

var themelixir = function(theme, callback) {
	
    elixir.config.assetsPath = "resources/assets/"+ theme;

    tmp = {
        js: "./resources/assets/"+ theme +"js/tmp/",
        css: "./resources/assets/"+ theme +"css/tmp/",
    };

    pub = {
        js: "./public/"+ theme +"js/",
        css: "./public/"+ theme +"css/",
    }

    elixir(callback);
}

themelixir("front", function(mix) {
    mix.less('all.less', tmp.css + "all.css")

        .styles([
            shared.css + "bootstrap.min.css",
            shared.css + "font-awesome.min.css",
            shared.css + "input/datepicker3.css",
            shared.css + "input/bootstrap-timepicker.min.css",
            shared.css + "input/dropzone/dropzone.css",
            shared.css + "input/bootstrap-fileupload.min.css",
            shared.css + "input/select2.css",
            "ui/pnotify.custom.css",
            "theme/theme.css",
            "theme/theme-elements.css",
            "theme/skin.css",
            "ui/rs-plugin/settings.css",
            "ui/owl.carousel.min.css",
            "ui/owl.theme.default.min.css",
            tmp.css + "all.css",
            "theme/theme-blog.css",
            "theme/theme-shop.css",
        ], "public/css/frontend.css")

        .scripts([
            shared.js + "jquery.min.js",
            shared.js + "bootstrap.min.js",
            "theme/modernizr.js",
            "ui/pnotify.custom.js",
            shared.js + "input/validator.min.js",
            shared.js + "input/bootstrap-maxlength.js",
            shared.js + "input/bootstrap-datepicker.js",
            shared.js + "input/bootstrap-timepicker.js",
            shared.js + "input/bootstrap-fileupload.min.js",
            shared.js + "input/dropzone.min.js",
            shared.js + "input/select2.min.js",
            shared.js + "input/ios7-switch.js",
            "ui/jquery.appear.min.js",
            "ui/common.min.js",
            "ui/rs-plugin/jquery.themepunch.tools.min.js",
            "ui/rs-plugin/jquery.themepunch.revolution.min.js",
            "ui/owl.carousel.min.js",
        ], "public/js/frontend.js")

});

themelixir("backend", function(mix) {
    mix.less('all.less', tmp.css + "all.css")

        .styles([
            shared.css + "bootstrap.min.css",
            shared.css + "font-awesome.min.css",
            "ui/jquery.dataTables.min.css",
            "ui/datatables.css",
            "ui/pnotify.custom.css",
            shared.css + "input/datepicker3.css",
            shared.css + "input/bootstrap-timepicker.min.css",
            shared.css + "input/dropzone/dropzone.css",
            shared.css + "input/bootstrap-fileupload.min.css",
            shared.css + "input/select2.css",
            "theme/theme.css",
            "theme/skin.css",
            tmp.css + "all.css",
        ], "public/css/backend.css")

        .scripts([
            shared.js + "jquery.min.js",
            shared.js + "bootstrap.min.js",
            "theme/nanoscroller.js",
            "theme/modernizr.js",
            "ui/pnotify.custom.js",
            shared.js + "input/validator.min.js",
            shared.js + "input/bootstrap-maxlength.js",
            shared.js + "input/bootstrap-datepicker.js",
            shared.js + "input/bootstrap-timepicker.js",
            shared.js + "input/bootstrap-fileupload.min.js",
            shared.js + "input/dropzone.min.js",
            shared.js + "input/select2.min.js",
            shared.js + "input/ios7-switch.js",
            "ui/jquery.dataTables.min.js",
            "theme/theme.js",
            "app/fn.js",
            "app/event.js",
            "app/angular.init.js",
            "app/init.js",
        ], "public/js/backend.js")
});
