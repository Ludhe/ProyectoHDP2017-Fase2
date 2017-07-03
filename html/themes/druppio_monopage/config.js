module.exports = {
	// theme machine name
  theme: 'druppio_monopage',
	// add additional required files to be copied to their respective destinations
  external: {
    src: [
      'libraries/bootstrap-sass/assets/fonts/bootstrap/**.*',
      'libraries/components-font-awesome/fonts/**.*',
      'libraries/bootstrap-sass/assets/javascripts/bootstrap.min.js'
    ],
    dest: [
      './fonts/bootstrap',
      './fonts/fontawesome',
      './js'
    ]
  },
	// configure sass source and destination directories
  sass: {
    enable: true,
    src: 'scss/**/**.scss',
    dest: 'css/'
  },
	// Autoprefixer options
	// to learn more about autoprefixer and possible configuration options please visit: https://github.com/postcss/autoprefixer#options
  autoprefixer: {
    browsers: ['> 0%']
  },
	// Broswersync options
	// to learn more about Broswersync and possible configuration options please visit: https://www.browsersync.io/docs/options
  browserSync: {
    open: false,
    serveStatic: ['.'],
    port: 3000,
    proxy: {
      target: 'http://domainname.com'
    }
  }
};
