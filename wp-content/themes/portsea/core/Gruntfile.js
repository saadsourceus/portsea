module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // CONFIG ===================================/
    sass: {                              // Task
          dist: {                            // Target
                  options: {                       // Target options
                    style: 'expanded',
                    lineNumbers: true,
                  },
                  files: {                         // Dictionary of files
                    'tmp/app.css': 'sass/app.scss'
                  }
                }
        },
    sprite:{
          all: {
            src: 'images/sprites/*.png',
            destImg: 'images/sprite.png',
            destCSS: 'sass/partials/_sprite.scss',
            imgPath: '../images/sprite.png',
            padding: 10,
          }
        },
    cmq: {
        your_target: {
          files: {
                  'css': ['tmp/app.css']
                }
        }
      },
  autoprefixer: {
              options: {
                    browsers: ['> 0%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
                  },
              dist: {
                  files: {
                      'css/app.css': 'css/app.css'
                  }
              }
          },
    watch: {
      sass: {
        files: ['sass/**/*.scss'],
        tasks: ['sass']
          },
      cmq: {
        files: ['tmp/app.css'],
        tasks: ['cmq']
      },
      auto: {
        files: ['tmp/app.css'],
        tasks: ['autoprefixer'],
        options: {
            livereload: true,
            }
      }
    }
  });

  // DEPENDENT PLUGINS =========================/
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-combine-media-queries');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-spritesmith');

  // TASKS =====================================/
  grunt.registerTask('default', ['watch']);



};