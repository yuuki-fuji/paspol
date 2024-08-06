const gulp = require('gulp');
const browserSync = require('browser-sync').create();
// const sass = require('gulp-sass')(require('sass'));

// Sassをコンパイルするタスク
// gulp.task('sass', function() {
//     return gulp.src('assets/scss/**/*.scss')
//         .pipe(sass().on('error', sass.logError))
//         .pipe(gulp.dest('assets/css'))
//         .pipe(browserSync.stream());
// });

// BrowserSyncを起動してファイルの変更を監視するタスク
gulp.task('serve', function () {
  browserSync.init({
    proxy: 'http://yuuki-paspol.local/', // LocalのサイトURLに置き換えてください
  });

  // gulp.watch('assets/scss/**/*.scss', gulp.series('sass'));
  gulp
    .watch(['**/*.php', 'assets/css/**/*.css', 'assets/js/**/*.js'])
    .on('change', browserSync.reload);
});

// デフォルトタスク
gulp.task('default', gulp.series('serve'));
