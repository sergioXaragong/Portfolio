var paths = {
    source: 'src/',
    dev: 'dev/',
    deploy: 'deploy/',

    assets: 'assets/',
    js: 'js/',
    css: 'css/',
    images: 'images/',
    vendor: 'vendor/'
};
var deploy = false;


/**** Dependencias ****/
const gulp = require('gulp'),
    pug = require('gulp-pug'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    less = require('gulp-less'),
    minifyCss = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer'),

    webserver = require('gulp-webserver'),
    gulpif = require('gulp-if');

var path = paths.dev;


/**** Configuración Tareas de Compilación ****/
gulp.task('pug', function(){
    gulp.src([paths.source+'**/*.pug', '!'+paths.source+'**/_*.pug'])
        .pipe(pug({
            pretty: !deploy
        }))
        .pipe(gulp.dest(path));
});
gulp.task('less', function(){
    var $path = path+paths.css;

    gulp.src(paths.source+paths.css+'main.less')
        .pipe(less({compress: deploy}))
        .pipe(gulpif(deploy, minifyCss()))
        .pipe(autoprefixer('last 10 versions', 'ie 9'))
        .pipe(gulp.dest($path));
});
gulp.task('js', function(){
    var pathScripts = path+paths.js;

    gulp.src(paths.source+paths.js+'**/*.js')
        .pipe(concat('main.js'))
        .pipe(gulpif(deploy, uglify()))
        .pipe(gulp.dest(pathScripts));
});


/**** Configuración Tareas de Optimización ****/
gulp.task('images', function(){
    var $path = path+paths.images;

    gulp.src(paths.assets+paths.images+'**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest($path));
});


/**** Configuración Tareas de Deploy ****/
gulp.task('vendor', function(){
    gulp.src(['./bower_components/normalize-css/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'normalize-css/'));

    gulp.src(['./bower_components/flexboxgrid/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'flexboxgrid/'));

    gulp.src(['./bower_components/fancybox/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'fancybox/'));

    gulp.src(['./bower_components/jquery/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'jquery/'));

    gulp.src(['./bower_components/single-page-nav/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'single-page-nav/'));

    gulp.src(['./bower_components/particles.js/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'particles.js/'));

    gulp.src(['./bower_components/typed.js/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'typed.js/'));

    gulp.src(['./bower_components/isotope/**/*'])
        .pipe(gulp.dest(path+paths.vendor+'isotope/'));
});
gulp.task('fonts', function(){
    var $path = path+paths.css+'fonts/';

    gulp.src(paths.assets+'fonts/**/*')
        .pipe(gulp.dest($path));
});


/**** Configuración Tareas de Development ****/
gulp.task('watch', function(){
    gulp.watch(paths.source+'**/*.pug', ['pug']);
    gulp.watch(paths.source+paths.css+'**/*.less', ['less']);
    gulp.watch(paths.source+paths.js+'**/*.js', ['js']);
});
gulp.task('webserver', function () {
    gulp.src('.')
        .pipe(webserver({
            livereload: true,
            open: true,
            port: 8000
        }));
});


/**** Configuración Tareas de Ejecucion ****/
gulp.task('compile', ['pug','less','js']);
gulp.task('compileDeploy', function(){
    deploy = true;
    path = paths.deploy;

    gulp.start('compile');
    gulp.start('images');
    gulp.start('vendor');
    gulp.start('fonts');
});

gulp.task('dev', ['compile','watch','webserver']);
gulp.task('deploy', ['compileDeploy']);
gulp.task('default', ['webserver']);