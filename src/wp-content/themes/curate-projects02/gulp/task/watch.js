var gulp  = require('gulp');
var paths = require('../util/config').paths;

gulp.task('watch', function() {
  gulp.watch(paths.componentsSrc, ['suit']);
});
