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

  return gulp.src(config.paths.mainFile)
    .pipe(sourcemaps.init())
        .pipe(rework(suit()))
        .pipe(rework(color()))
        .pipe(rework(rems()))
        .pipe(autoprefixer(config.autoprefixer))
    .pipe(rename('style.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.paths.componentsDest))

});
