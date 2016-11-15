// require all the libraries
const gulp          = require('gulp'),
  prettyError   = require('gulp-prettyerror'),
  debug         = require('gulp-debug'),
  sass          = require('gulp-sass'),
  autoPrefixer  = require('gulp-autoprefixer');

// sass source map
const sassSources = {
  main: {
    src   : './sass/**/*.scss',
    dest  : './src/web/css'
  }
}

////////////////////////////////////// START COMPILE SASS ////////////////////////////////////////////////////////////

function processSass(src, dest) {
  return gulp.src(src)
    .pipe(prettyError())
    .pipe(debug({
      title: 'Compiling SASS file(s):'
    }))
    .pipe(sass({
      // less configuration here
      outputStyle: 'expanded',
      precision: 8
    }).on('error', sass.logError)) // do the less
    .pipe(autoPrefixer({
      browsers: [
        'last 4 versions'
        , '> 1%'
        , 'Firefox ESR'
      ]
    }))
    .pipe(gulp.dest(dest));
}

// store the array of the task
var sassTasks = [];

for(var moduleName in sassSources) {
  var sourceMap = sassSources[moduleName];
  var taskName = 'sass:' + moduleName;
  sassTasks.push(taskName);

  // create the task
  gulp.task(taskName, processSass.bind(this, sourceMap.src, sourceMap.dest));

  // do the watcher
  gulp.watch(sourceMap.src, [taskName]);
}
////////////////////////////////////// FINISH COMPILE SASS ///////////////////////////////////////////////////////////

// run all the task by default
gulp.task('default', [].concat(
  sassTasks
));
