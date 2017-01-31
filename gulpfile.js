var gulp        = require('gulp'),
    del         = require('del'),
    minifyCSS   = require('gulp-clean-css'),
    plumber     = require('gulp-plumber'),
    rename      = require('gulp-rename'),
    sass        = require('gulp-sass'),
    uglify      = require('gulp-uglify'),
    print       = require('gulp-print');


gulp.task('delete', function() {
    del(['assets/dist/*'], function(err) {
        console.log('Files Deleted')
    })
});

gulp.task('sass', function () {
    return gulp.src('assets/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/dist/'));
});
/*
gulp.task('style', function() {
    return gulp.src('assets/dist/*.css')
        .pipe(minifyCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/dist'))
});
*/
gulp.task('print', function() {
    gulp.src('**/*.scss')
        .pipe(print(function(filepath) {
            return "built: " + filepath;
        }))
});

gulp.task('watch', function() {
    gulp.watch('assets/scss/**/*.scss', ['sass']);
});

gulp.task('default', ['delete', 'sass', 'print', 'watch']);