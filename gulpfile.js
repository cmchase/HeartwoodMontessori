var gulp = require('gulp'),
	less = require('gulp-less'),
	path = require('path'),
	LessPluginCleanCSS = require('less-plugin-clean-css'),
  cleancss = new LessPluginCleanCSS({ advanced: true }),
  watch = require('gulp-watch'),
  imagemin = require('gulp-imagemin'),
  pngquant = require('imagemin-pngquant'),

  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  react = require('gulp-react'),
  htmlreplace = require('gulp-html-replace'),

  path = {
    themeSrc: './wordpress/wp-content/themes/hwspring2016/', 
    themeDest: 'C:/inetpub/wwwroot/heartwood/wp-content/themes/hwspring2016/',
    js: './wordpress/wp-content/themes/hwspring2016/js/src/*.js',
    less: './wordpress/wp-content/themes/hwspring2016/styles/src/*.less',
    dest: {
      js: './wordpress/wp-content/themes/hwspring2016/js',
      css: './wordpress/wp-content/themes/hwspring2016/styles/css/'
    }
  }


gulp.task('transform', function(){
  return gulp.src(path.js)
    .pipe(react())
    .pipe(gulp.dest(path.dest.js))
})

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('less', function () {
  return gulp.src(path.less)
    .pipe(less({
      plugins: [cleancss]
    }))
    .pipe(gulp.dest(path.dest.css));
});


gulp.task('copy-dist', function(){
	gulp.src(path.themeSrc + '/**/*', {base: path.themeSrc})
    .pipe(gulp.dest(path.themeDest));
});

gulp.task('img', () => {
  return gulp.src(path.themeSrc + 'img/**/*')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(path.themeSrc + 'img/'));
});

gulp.task('watch', function () {
   gulp.watch([path.themeSrc + '*', 
                path.themeSrc + '*.php',
                path.themeSrc + 'js/*.js',
                path.themeSrc + 'styles/src/*.less', 
                path.themeSrc + 'styles/src/imports/*.less', 
                path.themeSrc + 'img/*'], 
              ['less', 'copy-dist']);
});