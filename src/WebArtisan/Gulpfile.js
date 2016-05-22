var exec = require('child_process').exec;
var gulp = require('gulp');
var changed = require('gulp-changed');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');


var DEST_CSS = './resources/assets/css/';
var DEST_JS = './resources/assets/js/';
var PROJECT_PATH = '../../../../../';

gulp.task('copy-dependencies', function ($callback) {
  // bootstrap slim
  gulp.src('./node_modules/bootstrap-theme-slim/dist/css/slim-min.css')
    .pipe(changed(DEST_CSS))
    .pipe(gulp.dest(DEST_CSS));
  gulp.src('./node_modules/bootstrap-theme-slim/dist/js/bootstrap.min.js')
    .pipe(changed(DEST_JS))
    .pipe(gulp.dest(DEST_JS));
  // bootstrap
  gulp.src('./node_modules/bootstrap/dist/css/bootstrap.min.css')
    .pipe(changed(DEST_CSS))
    .pipe(gulp.dest(DEST_CSS));
  // jquery.js
  gulp.src('./node_modules/jquery/dist/jquery.min.js')
    .pipe(changed(DEST_JS))
    .pipe(gulp.dest(DEST_JS));
  // nprogress.js
  gulp.src('./node_modules/nprogress/nprogress.js')
    .pipe(uglify())
    .pipe(changed(DEST_JS))
    .pipe(gulp.dest(DEST_JS));
  gulp.src('./node_modules/nprogress/nprogress.css')
    .pipe(changed(DEST_CSS))
    .pipe(gulp.dest(DEST_CSS));
  // pjax
  gulp.src('./bower_components/jquery-pjax/jquery.pjax.js')
    .pipe(uglify())
    .pipe(changed(DEST_JS))
    .pipe(gulp.dest(DEST_JS));

  // custom css
  gulp.src('./resources/assets/scss/*.scss')
    .pipe(changed(DEST_CSS))
    .pipe(sass())
    .pipe(cleanCss())
    .pipe(gulp.dest(DEST_CSS));

  // php artisan to publish files.
  var artisan = exec('php artisan vendor:publish --force --ansi',
    {
      cwd: PROJECT_PATH
    },
    function ($error, $stdout, $stdError) {
      if ($error) {
        return $callback($error);
      }
      console.log($stdout);
      $callback();
    });

});

gulp.task('watch', function () {
  gulp.watch([
    './resources/assets/*/*.scss',
    './resources/assets/js/app.js'
  ], ['copy-dependencies']);
});


gulp.task('default', [
  'copy-dependencies'
]);
