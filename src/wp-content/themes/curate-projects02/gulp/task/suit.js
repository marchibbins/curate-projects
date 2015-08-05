var gulp         = require('gulp');
var rework       = require('gulp-rework');
var rename       = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps   = require('gulp-sourcemaps');
var config       = require('../util/config');
var handleError  = require('../util/handleError');

// rework-suit includes multiple rework plugins.
var suit         = require('rework-suit');
var rems         = require('rework-rem-fallback');
var color        = require('rework-plugin-colors');

gulp.task('suit', function() {

  return gulp.src(config.paths.stylesEntry)
    .pipe(sourcemaps.init()).on('error', handleError)
        .pipe(rework(suit())).on('error', handleError)
        .pipe(rework(color())).on('error', handleError)
        .pipe(rework(rems())).on('error', handleError)
        .pipe(autoprefixer(config.autoprefixer))
    .pipe(rename('style.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.paths.stylesDest))

});
