const mix = require('laravel-mix');
const lodash = require("lodash");
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/assets/" //build assets files
};


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

var assets = {
    js: [
        "./node_modules/jquery/dist/jquery.js",
        "./node_modules/bootstrap/dist/js/bootstrap.bundle.js",
        "./node_modules/metismenujs/dist/metismenujs.min.js",
        "./node_modules/jquery-slimscroll/jquery.slimscroll.js",
        "./node_modules/feather-icons/dist/feather.min.js",
    ]
};

//copying required assets
lodash(assets).forEach(function (asset, type) {
    var js = [];
    for (let i = 0; i < asset.length; ++i) {
        js.push(asset[i]);
    };
    mix.combine(js, folder.dist_assets + "js/vendor.js").minify(folder.dist_assets + "js/vendor.js");
});

// optional third party assets
var third_party_assets = {
    css_js: [
        { "name": "sortablejs", "assets": ["./node_modules/sortablejs/Sortable.min.js"] },
        { "name": "apexcharts", "assets": ["./node_modules/apexcharts/dist/apexcharts.min.js"] },
        { "name": "parsleyjs", "assets": ["./node_modules/parsleyjs/dist/parsley.min.js"] },
        {
            "name": "smartwizard", "assets": ["./node_modules/smartwizard/dist/js/jquery.smartWizard.min.js",
                "./node_modules/smartwizard/dist/css/smart_wizard.min.css",
                "./node_modules/smartwizard/dist/css/smart_wizard_theme_arrows.min.css",
                "./node_modules/smartwizard/dist/css/smart_wizard_theme_circles.min.css",
                "./node_modules/smartwizard/dist/css/smart_wizard_theme_dots.min.css"
            ]
        },
        { "name": "summernote", "assets": ["./node_modules/summernote/dist/summernote-bs4.min.js", "./node_modules/summernote/dist/summernote-bs4.css"] },
        { "name": "dropzone", "assets": ["./node_modules/dropzone/dist/min/dropzone.min.js", "./node_modules/dropzone/dist/min/dropzone.min.css"] },
        { "name": "bootstrap-tagsinput", "assets": ["./node_modules/@adactive/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js", "./node_modules/@adactive/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"] },
        { "name": "select2", "assets": ["./node_modules/select2/dist/js/select2.min.js", "./node_modules/select2/dist/css/select2.min.css"] },
        { "name": "multiselect", "assets": ["./node_modules/multiselect/js/jquery.multi-select.js", "./node_modules/multiselect/css/multi-select.css"] },
        { "name": "flatpickr", "assets": ["./node_modules/flatpickr/dist/flatpickr.min.js", "./node_modules/flatpickr/dist/flatpickr.min.css"] },
        { "name": "bootstrap-colorpicker", "assets": ["./node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js", "./node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"] },
        { "name": "bootstrap-touchspin", "assets": ["./node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js", "./node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"] },
        {
            "name": "datatables", "assets": ["./node_modules/datatables.net/js/jquery.dataTables.min.js",
                "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js",
                "./node_modules/datatables.net-responsive/js/dataTables.responsive.min.js",
                "./node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js",
                "./node_modules/datatables.net-buttons/js/dataTables.buttons.min.js",
                "./node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js",
                "./node_modules/datatables.net-buttons/js/buttons.html5.min.js",
                "./node_modules/datatables.net-buttons/js/buttons.flash.min.js",
                "./node_modules/datatables.net-buttons/js/buttons.print.min.js",
                "./node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js",
                "./node_modules/datatables.net-select/js/dataTables.select.min.js",
                "./node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css",
                "./node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css",
                "./node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css",
                "./node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css"
            ]
        },
        { "name": "moment", "assets": ["./node_modules/moment/min/moment.min.js"] },
        {
            "name": "fullcalendar-bootstrap", "assets": ["./node_modules/@fullcalendar/bootstrap/main.min.js",
                "./node_modules/@fullcalendar/bootstrap/main.min.css",
            ]
        },
        {
            "name": "fullcalendar-core", "assets": ["./node_modules/@fullcalendar/core/main.min.js",
                "./node_modules/@fullcalendar/core/main.min.css",
            ]
        },
        {
            "name": "fullcalendar-daygrid", "assets": ["./node_modules/@fullcalendar/daygrid/main.min.js",
                "./node_modules/@fullcalendar/daygrid/main.min.css"
            ]
        },
        { "name": "fullcalendar-interaction", "assets": ["./node_modules/@fullcalendar/interaction/main.min.js"] },
        {
            "name": "fullcalendar-timegrid", "assets": ["./node_modules/@fullcalendar/timegrid/main.min.js",
                "./node_modules/@fullcalendar/timegrid/main.min.css"]
        },
        {
            "name": "fullcalendar-list", "assets": ["./node_modules/@fullcalendar/list/main.min.js",
                "./node_modules/@fullcalendar/list/main.min.css"]
        },
        { "name": "list-js", "assets": ["./node_modules/list.js/dist/list.min.js"] },
        {
            "name": "jqvmap", "assets": ["./node_modules/jqvmap/dist/jquery.vmap.min.js",
                "./node_modules/jqvmap/dist/jqvmap.min.css",
                "./node_modules/jqvmap/dist/maps/jquery.vmap.usa.js",
            ]
        },
    ]
};

//copying third party assets
lodash(third_party_assets).forEach(function (assets, type) {
    if (type == "css_js") {
        lodash(assets).forEach(function (plugin) {
            var name = plugin['name'],
                assetlist = plugin['assets'],
                css = [],
                js = [];
            lodash(assetlist).forEach(function (asset) {
                var ass = asset.split(',');
                for (let i = 0; i < ass.length; ++i) {
                    if (ass[i].substr(ass[i].length - 3) == ".js") {
                        js.push(ass[i]);
                    } else {
                        css.push(ass[i]);
                    }
                };
            });
            if (js.length > 0) {
                mix.combine(js, folder.dist_assets + "/libs/" + name + "/" + name + ".min.js");
            }
            if (css.length > 0) {
                mix.combine(css, folder.dist_assets + "/libs/" + name + "/" + name + ".min.css");
            }
        });
    }
});


// copy all fonts
var out = folder.dist_assets + "fonts";
mix.copyDirectory(folder.src + "fonts", out);

// copy all images 
out = folder.dist_assets + "images";
mix.copyDirectory(folder.src + "images", out);

// scss
mix.sass('resources/scss/bootstrap.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap.css");
mix.sass('resources/scss/bootstrap-dark.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap-dark.css");
mix.sass('resources/scss/icons.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/icons.css");
mix.sass('resources/scss/app-rtl.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app-rtl.css");
mix.sass('resources/scss/app.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app.css");
mix.sass('resources/scss/app-dark.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app-dark.css");

//copying demo pages related assets
var app_pages_assets = {
    js: [
        folder.src + "js/pages/dashboard.init.js",
        folder.src + "js/pages/calendar.init.js",
        folder.src + "js/pages/apexcharts.init.js",
        folder.src + "js/pages/form-advanced.init.js",
        folder.src + "js/pages/form-validation.init.js",
        folder.src + "js/pages/form-wizard.init.js",
        folder.src + "js/pages/form-editor.init.js",
        folder.src + "js/pages/table-listjs.init.js",
        folder.src + "js/pages/datatables.init.js",
        folder.src + "js/pages/kanban.init.js",
        folder.src + "js/pages/email-inbox.init.js",
        folder.src + "js/pages/widgets.init.js",
    ]
};

var out = folder.dist_assets + "js/";
lodash(app_pages_assets).forEach(function (assets, type) {
    for (let i = 0; i < assets.length; ++i) {
        mix.js(assets[i], out + "pages");
    };
});

mix.combine('resources/js/app.js', folder.dist_assets + "js/app.min.js");

mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            files: [
                'app/**/*',
                'public/**/*',
                'resources/views/**/*',
                'routes/**/*'
            ]
        })
    ]
});