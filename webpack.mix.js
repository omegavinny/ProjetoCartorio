const mix = require('laravel-mix');
const path = required('path');

mix.alias(
    {
      '@': path.resolve(__dirname, 'resource/js'),
      '@images': path.resolve(__dirname, 'resource/images')
    }
  ).js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require("tailwindcss"),
  ]);
