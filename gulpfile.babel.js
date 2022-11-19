import { src, dest } from 'gulp';
import yargs from 'yargs';
import postCss from 'gulp-postcss';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
const PRODUCTION = yargs.argv.prod;

export function styles() {
  return src('wp-content/themes/ft-theme/src/index.css')
    .pipe(postCss().on('error', postCss.logError))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(dest('wp-content/themes/ft-theme/dist/css'));
}