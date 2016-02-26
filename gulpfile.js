var gulp = require('gulp'),
	less = require('gulp-less'),
	path = require('path'),
	LessPluginCleanCSS = require('less-plugin-clean-css'),
  cleancss = new LessPluginCleanCSS({ advanced: true }),
  watch = require('gulp-watch'),
  imagemin = require('gulp-imagemin'),
  pngquant = require('imagemin-pngquant'),
  themeSrc = './wordpress/wp-content/themes/hwspring2016/',  
  themeDest = 'C:/inetpub/wwwroot/heartwood/wp-content/themes/hwspring2016/'


gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('less', function () {
  gulp.src(themeSrc + 'styles/src/*.less')
    .pipe(less({
      plugins: [cleancss]
    }))
    .pipe(gulp.dest(themeSrc + 'styles/css/' ));
});


gulp.task('copy-dist', function(){
	gulp.src(themeSrc + '/**/*', {base: themeSrc})
    .pipe(gulp.dest(themeDest));
});

gulp.task('img', () => {
  return gulp.src(themeSrc + 'img/**/*')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(themeSrc + 'img/'));
});

gulp.task('watch', function () {
   gulp.watch([themeSrc + '*', 
                themeSrc + '*.php',
                themeSrc + 'js/*',
                themeSrc + 'styles/src/*.less', 
                themeSrc + 'styles/src/imports/*.less', 
                themeSrc + 'img/*'], 
              ['less', 'copy-dist']);
});