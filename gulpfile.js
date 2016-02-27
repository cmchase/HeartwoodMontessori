"use strict"

// Dependencies
var gulp = require('gulp');
var browserify = require('browserify');
var buffer = require('vinyl-buffer');
var eslint = require('gulp-eslint');
var imagemin = require('gulp-imagemin');
var less = require('gulp-less');
var pngquant = require('imagemin-pngquant');
var reactify = require('reactify');
var source = require('vinyl-source-stream');
var uglify = require('gulp-uglify');

// Constants
var themeSrc = './wordpress/wp-content/themes/hwspring2016/';
var config = {
	paths: {
	    themeSrc: themeSrc,
	    js: themeSrc + 'js/src/**/*.js',
	    mainJs: themeSrc + 'js/src/main.js',
	    less: themeSrc + 'styles/src/**/*.less',
	    img: themeSrc + 'img/**/*',
	    dest: {
	      js: themeSrc + 'js/',
	      css: themeSrc + 'styles/css/',
	      img: themeSrc + 'img/',
	      theme: 'C:/inetpub/wwwroot/heartwood/wp-content/themes/hwspring2016/'
	    }
	}
}

// Tasks
gulp.task('js', function() {
	browserify(config.paths.mainJs)
		.transform(reactify)
		.bundle()
		.on('error', console.error.bind(console))
		.pipe(source('bundle.js'))
		.pipe(buffer())
		.pipe(uglify())
		.pipe(gulp.dest(config.paths.dest.js))
});

gulp.task('eslint', function(){
	return gulp.src(config.paths.js)
		.pipe(eslint({config: 'eslint.config.json'}))
		.pipe(eslint.format());
})

gulp.task('less', function () {
  gulp.src(config.paths.less)
    .pipe(less({}))
    .pipe(gulp.dest(config.paths.dest.css));
});

gulp.task('img', () => {
  return gulp.src(config.paths.img)
		    .pipe(imagemin({
		      progressive: true,
		      svgoPlugins: [{removeViewBox: false}],
		      use: [pngquant()]
		    }))
		    .pipe(gulp.dest(config.paths.dest.img));
});

gulp.task('copy-dist', function(){
	gulp.src(config.paths.themeSrc + '/**/*', {base: config.paths.themeSrc})
    	.pipe(gulp.dest(config.paths.dest.theme));
});

gulp.task('watch', function(){
	gulp.watch(config.paths.js, ['js', 'eslint', 'copy-dist']);
	gulp.watch(config.paths.less, ['less', 'copy-dist']);
    gulp.watch([config.paths.themeSrc + '**/*.php'], ['copy-dist']);
})

gulp.task('default', ['js', 'eslint', 'less', 'watch'])