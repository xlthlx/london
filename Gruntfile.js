module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    jshint: {
      options: {
        reporter: require('jshint-stylish'),
        esversion: 6
      },
      build: ['Gruntfile.js', 'src/js/*.js']
    },

    uglify: {
      options: {
        banner: '/* <%= grunt.template.today("dd/mm/yyyy HH:MM:ss") %> */'
      },
      build: {
        files: {
          'assets/js/main.min.js': ['assets/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js','src/js/scripts.js'],
          'assets/js/admin/admin.min.js': ['src/js/admin/admin.js'],
          'assets/js/admin/login.min.js': ['src/js/admin/login.js', 'assets/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js']
        }
      }
    },

    cssmin: {
      target: {
        files: {
          'assets/css/main.min.css': ['assets/vendor/twbs/bootstrap/dist/css/bootstrap.css', 'src/css/style.css'],
          'assets/css/admin/admin.min.css': ['src/css/admin/admin.css'],
          'assets/css/admin/login.min.css': ['assets/vendor/twbs/bootstrap/dist/css/bootstrap.css','src/css/style.css','src/css/admin/login.css'],
        }
      }
    },

    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'src/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'assets/'
        }]
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-imagemin');

  grunt.registerTask('default', ['jshint', 'uglify', 'cssmin', 'imagemin']);
};
