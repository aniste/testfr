(function() {
  module.exports = function(grunt) {


    grunt.initConfig({
      uglify: {

        options: {
          mangle: false,
          screwIE8: true
        },


        my_target: {
          files: {
            'public/wp-content/themes/fr/assets/main.min.js': [
              'public/wp-includes/js/wp-emoji-release.min.js',
              'public/wp-includes/js/jquery/jquery.js',
              'public/wp-includes/js/jquery/jquery-migrate.min.js',
              'public/wp-content/themes/fr/js/lib/modernizr-2.7.1.min.js',
              'public/wp-content/themes/fr/js/jquery.hypher.js',
              'public/wp-content/themes/fr/js/nb-no.js',
              'public/wp-content/themes/fr/js/scroll.js',
              'public/wp-content/themes/fr/js/scripts.js',
              'public/wp-content/themes/fr/js/table.js',
              'public/wp-content/themes/fr/js/links.js',
              'public/wp-content/themes/fr/js/menu.js',
              'public/wp-content/themes/fr/js/search.js',
              'public/wp-content/themes/fr/js/fbr.js',
              'public/wp-content/plugins/opensearchserver-search/js/opensearchserver.js',
              'public/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js',
              'public/wp-content/plugins/contact-form-7/includes/js/scripts.js',
              'public/feedback-form/form.js'
            ]
          }
        }
      },
      cssmin: {
        target: {
          files: {
            'public/wp-content/themes/fr/assets/main.min.css': [
              'public/wp-content/plugins/contact-form-7/includes/css/styles.css',
              'public/wp-content/plugins/opensearchserver-search/css/oss-style.css',
              'public/wp-content/themes/fr/fonts/font-awesome/css/font-awesome.min.css',
              'public/wp-content/themes/fr/styles/css/main.css',
              'public/feedback-form/styles.css'
            ]
          }
        }
      }
      /*,
      watch: {
        files: ['<%= jshint.files %>'],
        tasks: ['sass']
      }
      */
    });

    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    //grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['uglify', 'cssmin']);
  };

})();
