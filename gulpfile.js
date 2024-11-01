var gulp = require('gulp'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat');

gulp.task('js', function() {
	// Minify and concat public javascript files.
	gulp.src('assets/js/admin.js')
		.pipe(uglify())
		.pipe(concat('admin.js'))
		.pipe(gulp.dest('assets/build/'))
});

gulp.task('watch', function() {
 	gulp.watch('assets/js/admin.js', ['js']);
});