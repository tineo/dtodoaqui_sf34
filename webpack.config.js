var Encore = require('@symfony/webpack-encore');

Encore


    .enableReactPreset()
    // the project directory where compiled assets will be stored
    //.setOutputPath('public/build/')
    .setOutputPath('web/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    //.addEntry('js/app', './assets/js/app.js')
    //.addStyleEntry('css/app', './assets/css/app.scss')

    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/landin', './assets/js/landin.js')
    .addEntry('js/place', './assets/js/place.js')
    .addEntry('js/register', './assets/js/register.js')

    .addStyleEntry('css/app', './assets/css/app.scss')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
