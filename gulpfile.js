const { src, dest, watch , parallel } = require('gulp');
const sass = require('gulp-dart-sass');
const autoprefixer = require('autoprefixer');
const postcss    = require('gulp-postcss')
const sourcemaps = require('gulp-sourcemaps')
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');
const rename = require('gulp-rename');
const notify = require('gulp-notify');
const cache = require('gulp-cache');

const paths = {
    scss: 'resources/scss/app.scss',
    js: 'resources/js/**/*.js',
}


// css es una función que se puede llamar automaticamente
function css() {
    return src([
        paths.scss
    ])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer(), cssnano()]))
        // .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('.'))
        .pipe( dest('./public/css/') );
}


function javascript() {
    return src(paths.js)
      .pipe(sourcemaps.init())
      .pipe(concat('app.js')) // final output file name
      .pipe(terser())
      .pipe(sourcemaps.write('.'))
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest('./public/js'))
}

function watchArchivos() {
    watch( paths.scss, css );
    watch( paths.js, javascript );
}
  
exports.default = parallel(css, javascript, watchArchivos ); 