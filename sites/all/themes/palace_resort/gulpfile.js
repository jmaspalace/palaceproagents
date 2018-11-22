/*
* Dependencias
*/
var gulp = require('gulp'),
  	concat = require('gulp-concat'),
  	uglify = require('gulp-uglify'),
  	cleanCSS = require('gulp-clean-css'),
    gutil = require('gulp-util'),
  	sass = require('gulp-sass');


/*
* Configuración de la tarea 'demo'
*/
gulp.task('demo', function () {
  gulp.src('js/source/*.js')
  .pipe(uglify())
  .on('error', function (err) { gutil.log(gutil.colors.red('[Error]'), err.toString()); })
  .pipe(gulp.dest('js/'))
});

gulp.task('sass', function () {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css/source'));
});

gulp.task('sass:watch', function () {
  gulp.watch('./sass/**/*.scss', ['sass']);
});


gulp.task('minify-css', ['sass'], function() {
  return gulp.src('css/source/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('./css'));
});

gulp.task('watch', function() {
    gulp.watch('js/source/*.js', ['demo']);
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch('css/source/*.css', ['minify-css']);
});

gulp.task('alls', ['demo', 'sass', 'minify-css', 'watch']);
