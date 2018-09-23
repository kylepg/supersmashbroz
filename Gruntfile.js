module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //
    //─── WATCH ──────────────────────────────────────────────────────
    // Defines tasks to be run when files are changed.

    watch: {
      css: {
        files: ['wp-content/themes/perfect-portfolio-child/scss/*.scss'],
        tasks: ['sass', 'notify:done'],
      },
    },

    //
    //─── SASS ───────────────────────────────────────────────────────
    // Compiles and minifies SCSS files. Also generates a sourcemap.

    sass: {
      min: {
        options: {
          sourcemap: 'none',
        },
        files: {
          'wp-content/themes/perfect-portfolio-child/style.css': 'wp-content/themes/perfect-portfolio-child/scss/main.scss',
        },
      },
    },

    //
    //─── NOTIFY ───────────────────────────────────────────
    // Notifies you when all tasks have completed.

    notify: {
      done: {
        options: {
          title: 'project-name - grunt',
          message: 'build complete ✅✅✅',
        },
      },
    },
  });

  //
  //─── LOAD TASKS ────────────────────────────────────────────────────────────────────
  // Load grunt tasks from node_modules.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-notify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.registerTask('default', ['watch']);
};
