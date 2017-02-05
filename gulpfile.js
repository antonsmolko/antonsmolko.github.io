const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('styles.less');
});

elixir(function(mix) {
    mix.less('articles.less');
});

elixir(function(mix) {
    mix.less('article.less');
});

elixir(function(mix) {
    mix.less('login.less');
});

elixir(function(mix) {
    mix.less('admin.less');
});

elixir(function(mix) {
    mix.less('uikit.theme.less');
});

elixir(function(mix) {
    mix.scripts(['articles.js'], 'public/js/articles.js')
        .scripts(['article.js'], 'public/js/article.js')
        .scripts(['admin.articles.js'], 'public/js/admin.articles.js');
});


// var config = {
//     src: './resources/assets/',
//     dest: './public/',
//     css: {
//         watch: 'less/**/*.less',
//         src: 'less/**/*.less',
//         dest: 'css'
//     },
//
//     js: {
//         watch: 'js/**/*.js',
//         src: 'js/**/*.js'
//     }
// };
//
// var gulp = require('gulp');
// var less = require('gulp-less');
// var gcmq = require('gulp-group-css-media-queries');
// var clean = require('gulp-clean-css');
// var autoprefixer = require('gulp-autoprefixer');
// var browserSync = require('browser-sync').create();
//
// gulp.task('less', function(){
//     gulp.src(config.src + config.css.src)
//         .pipe(less())
//         .pipe(autoprefixer({
//             browsers: ['> 0.1%'],
//             cascade: false
//         }))
//         .pipe(gcmq())
//         //.pipe(clean())
//         .pipe(gulp.dest(config.dest + config.css.dest))
//         .pipe(browserSync.reload({
//             stream: true
//         }));
//
// });
//
// // gulp.task('php', function(){
// //     gulp.src(config.src + config.php.watch)
// //         .pipe(browserSync.reload({
// //             stream: true
// //         }));
// // });
//
// gulp.task('js', function () {
//     gulp.src(config.js.src)
//         .pipe(browserSync.reload({
//             stream: true
//         }));
// });
//
// gulp.task('browserSync', function(){
//     browserSync.init({
//         proxy: "http://localhost:8888/laravel.loc/public"
//     })
// });
//
// gulp.task('watch', ['browserSync'], function(e){
//     gulp.watch(config.src + config.css.watch, ['less']);
//     // gulp.watch(config.src + config.php.watch, ['php']);
//     gulp.watch(config.js.watch, ['js']);
// });