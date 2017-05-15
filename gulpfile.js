var gulp = require('gulp');
var	uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var babel = require('gulp-babel');

var paths = {
	nodePath: 'node_modules/',
	destPath: 'src/dist/',
	inputPath: 'src/assets/'
};

gulp.task('styles', function() {
	return gulp.src(paths.inputPath + 'sass/**/*.scss')
		.pipe(sass({
				outputStyle: 'compressed'
			})
		)
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest(paths.destPath + 'css'));
});

gulp.task('js', function() {
	return gulp.src(paths.inputPath + 'js/**/*.js')
		.pipe(babel({
			presets: ['es2015'],
			compact: true
		}))
		.pipe(uglify())
		.pipe(gulp.dest(paths.destPath + 'js'));
});

gulp.task('watch', function() {
	gulp.watch(paths.inputPath + 'js/**/*.js', ['js']);
	gulp.watch(paths.inputPath + 'sass/**/*.scss', ['styles']);
});