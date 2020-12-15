const gulp = require("gulp")
const { dest, src, parallel, watch } = gulp
const browserSync = require("browser-sync")
const babel = require('gulp-babel')

const site = 'test-junior'

function browser() {
    browserSync.init({
        proxy: site,
        open: false
    });
    browserSync.watch(__dirname + '/').on('change', browserSync.reload);
    browserSync.watch(__dirname + '/dev/*.js', parallel(js)).on('change', browserSync.reload);
}

function js() {
    return src(__dirname + '/dev/*.js')
        .pipe(babel())
        .pipe(dest(__dirname + '/'));
}


exports.default = parallel(browser, js)

