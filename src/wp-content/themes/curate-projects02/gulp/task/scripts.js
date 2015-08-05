var browserify   = require('browserify');
var concat       = require('gulp-concat');
var gulp         = require('gulp');
var handleError = require('../util/handleError');
var config       = require('../util/config');
var source       = require('vinyl-source-stream');
var notify       = require("gulp-notify");

gulp.task('scripts', ['client'], function() {
  gulp.src([
    './src/scripts/libs/**/*.js',
    './src/js/client.js'
  ])
    .pipe(concat('main.js'))
    .pipe(gulp.dest(config.paths.scriptsDest));
});

gulp.task('client', function(){
  return browserify({
      entries: ['./src/scripts/main.js'],
      extensions: ['.js', '.html'],
      debug:true
    })
    .bundle()
    .on('error', handleError)
    .pipe(source('client.js'))
    .pipe(gulp.dest('./src/js/'));
});
