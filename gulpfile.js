const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass');
const cleanCss = require('gulp-clean-css');

// config
const paths = {
    src: {
        sass: 'resources/assets/sass/',
        fonts: 'resources/assets/fonts/',
        images: 'resources/assets/images/',
    },
    dist: {
        css: 'public/css/',
        fonts: 'public/fonts/',
        images: 'public/images/',
    }
};

// sass
gulp.task('sass', function () {
    return gulp.src([paths.src.sass + 'app.scss', paths.src.sass + 'preload.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(cleanCss({
            compatibility: 'ie8'
        }))
        .pipe(gulp.dest(paths.dist.css));
});

gulp.task('sass:watch', function () {
    gulp.watch(paths.src.sass + '**/*.scss', ['sass']);
});

// copy tasks
gulp.task('copy:fonts', function () {
    gulp.src(paths.src.fonts + '**/*.{ttf,woff,woff2,eof,svg}')
        .pipe(gulp.dest(paths.dist.fonts));
});

gulp.task('copy:images', function () {
    gulp.src(paths.src.images + '**/*.{png,jpg,svg}')
        .pipe(gulp.dest(paths.dist.images));
});

gulp.task('copy', ['copy:fonts', 'copy:images']);

gulp.task('default', ['sass', 'copy']);
gulp.task('watch', ['sass:watch'])
