const mix = require('laravel-mix');
require('laravel-mix-tailwind');
let LiveReloadPlugin = require('webpack-livereload-plugin');

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
  .extract(['vue', 'jquery'])
  .sass('resources/sass/app.scss', 'public/css', {
    implementation: require('dart-sass')
  })
  .version()
  .copy('node_modules/font-awesome/fonts/*', 'public/fonts/')
  .copy('node_modules/ionicons/dist/fonts/*', 'public/fonts/')
  .copy('node_modules/material-design-iconic-font/dist/fonts/*', 'public/fonts/')
  .copy('node_modules/simple-line-icons/fonts/*', 'public/fonts/')
  .browserSync('dcas-l57.test')
  .tailwind();


mix.webpackConfig({
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        loader: 'ts-loader',
        options: {appendTsSuffixTo: [/\.vue$/]},
        exclude: /node_modules/,
      },
    ],
  },
  plugins: [
    new LiveReloadPlugin()
  ],
  resolve: {
    extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
  },
});
