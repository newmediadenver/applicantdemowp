module.exports = function(grunt) {
  'use strict';
  // Load tasks automatically with 'load-grunt-tasks' plugin.
  require('load-grunt-tasks')(grunt);

  var themeName = 'dac';
  var themeDir = 'docroot/content/themes/' + themeName;
  var sassLib = [themeDir + '/assets/vendor'];
  var stylesheets = {};
  stylesheets[themeDir + '/assets/css/main.css'] = themeDir + '/assets/less/main.less';

  var jsFileList = [
    themeDir + '/assets/js/plugins/*.js',
    themeDir + '/assets/js/_*.js'
  ];

  var jsFiles = {};
  jsFiles[themeDir + '/assets/js/scripts.js'] = jsFileList;


  var versionFiles = {};
  versionFiles[themeDir + '/lib/scripts.php'] = themeDir +'/assets/{css,js}/{main,scripts}.{css,js}';


  // Project configuration.
  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        themeDir + '/assets/js/*.js',
        '!'+ themeDir +'/assets/js/scripts.js',
        '!'+ themeDir +'/assets/**/*.min.*'
      ]
    },
    less: {
      dev: {
        files: stylesheets,
        options: {
          compress: false,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: true,
          sourceMapFilename: themeDir + '/assets/css/main.css.map',
          sourceMapRootpath: '/content/themes/' + themeName + '/'
        }
      },
      build: {
        files: stylesheets,
        options: {
          compress: true
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: jsFileList,
        dest: themeDir +'/assets/js/scripts.js',
      },
    },

    uglify: {
      dist: {
        files: jsFiles
      }
    },

    postcss: {
      dev: {
        options: {
          map: {
            inline: false
          },
          processors: [
            require('autoprefixer-core')({browsers: ['last 2 versions', 'ie 9']}) // add vendor prefixes
          ]
        },
        src: themeDir +'/assets/css/*.css'
      },
      build: {
        options: {
          map: false,
          processors: [
            require('autoprefixer-core')({browsers: ['last 2 versions', 'ie 9']}),
            require('cssnano')() //minify final output
          ]
        },
        src: themeDir + '/assets/css/*.css'
      }
    },
    modernizr: {
      build: {
        devFile: themeDir + '/assets/vendor/modernizr/modernizr.js',
        outputFile: themeDir + '/assets/js/vendor/modernizr.min.js',
        files: {
          'src': [
            [themeDir + '/assets/js/scripts.js'],
            [themeDir + '/assets/css/syle.css']
          ]
        },
        extra: {
          shiv: false
        },
        uglify: true,
        parseFiles: true
      }
    },
    version: {
      default: {
        options: {
          format: true,
          length: 32,
          manifest: themeDir + '/assets/manifest.json',
          querystring: {
            style: 'roots_css',
            script: 'roots_js'
          }
        },
        files: versionFiles
      }
    },
    watch: {
      less: {
        files: [
          themeDir + '/assets/less/*.less',
          themeDir + '/assets/less/**/*.less'
        ],
        tasks: ['less:dev', 'postcss:dev'],
      },
      js: {
        files: jsFileList,
        tasks: ['jshint', 'concat']
      }
    },

  });

  // Default task(s).
  grunt.registerTask('default', [
    'dev'
  ]);
  grunt.registerTask('dev', [
    'jshint',
    'less:dev',
    'postcss:dev',
    'concat'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'less:build',
    'postcss:build',
    'uglify',
    'modernizr',
    'version'
  ]);

};
