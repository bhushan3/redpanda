// Node packages / dependencies.
const { task, series, watch, src, dest } = require( 'gulp' );
const autoprefixer = require( 'autoprefixer' );
const babel = require( 'gulp-babel' );
const browserSync = require( 'browser-sync' ).create();
const clean = require( 'gulp-clean' );
const concat = require( 'gulp-concat' );
const package = require( './package.json' );
const postCSS = require( 'gulp-postcss' );
const sass = require( 'gulp-sass' );
const zip = require('gulp-zip');

// Compile SASS.
task( 'sass', function() {
	return src( './src/scss/style.scss' )
		.pipe( sass( { outputStyle: 'expanded' } ).on( 'error', sass.logError ) )
		.pipe( postCSS( [ autoprefixer() ] ) )
		.pipe( dest( './' ) )
		.pipe( browserSync.stream() );
} );

// Compile and bundle JS files.
task( 'js', function() {
	return src( './src/js/script.js' )
		.pipe( babel() )
		.pipe( concat( 'script.js' ) )
		.pipe( dest( './' ) )
		.pipe( browserSync.stream() );
} );

// Watch files changes and perform the task and reload the browser.
task( 'serve', function() {
	browserSync.init( {
		open: true,
		proxy: 'localhost/wp524',
	} );
	watch( './src/scss/**/*.scss', series( 'sass' ) );
	watch( './src/js/*.js', series( 'js' ) );
	watch( [ './**/*.php', '!./node_modules', '!./src', '!./assets' ] ).on( 'change', browserSync.reload );
} );

task( 'zip', function() {
	return src( [
		'*',
		'./assets/**/*',
		'./includes/**/*',
		'!node_modules',
		'!src',
		'!.editorconfig',
		'!.gitignore',
		'!gulpfile.js',
		'!package.json',
		'!package-lock.json',
		'!phpcs.xml.dist',
		'!README.md',
		'!' + package.name + '.zip',
	], { base: '.' } )
		.pipe( zip( package.name + '.zip' ) )
		.pipe( dest( '.' ) );
} );

// Clean dist folder.
task( 'clean', function() {
	return src( [ './style.css', './script.js' ], { allowEmpty: true, read: false } )
		.pipe( clean() );
} );

// Prepare all for production.
task( 'build', series( 'clean', 'sass', 'js' ) );

// Default gulp task.
task( 'default', series( 'build', 'serve' ) );
