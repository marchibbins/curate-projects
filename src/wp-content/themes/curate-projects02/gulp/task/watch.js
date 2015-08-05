var gulp  = require('gulp');
var paths = require('../util/config').paths;

gulp.task('watch', function() {
  gulp.watch(paths.stylesSrc, ['suit']);
  gulp.watch(paths.scriptsSrc, ['scripts']);
});
