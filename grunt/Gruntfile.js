module.exports = function(grunt){
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                style : 'compressed'
            },
            materialize: {
                files: [{
                    expand: true,
                    cwd: "../materialize-src/sass/",
                    src: ['materialize.scss'],
                    dest: '../stylesheets/css/',
                    ext: '.css'
                }]
            },
            otherSass: {
                files: [{
                    expand: true,
                    cwd: "../stylesheets/scss/",
                    src: ['*.scss'],
                    dest: '../stylesheets/css/',
                    ext: '.css'
                }]
            }

        },
        copy: {
            main: {
                files: [{
                    expand: true,
                    cwd: '../materialize-src/js/bin/',
                    src: ['materialize.min.js'],
                    dest: '../js/',
                    ext: '.js'
                }]
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('default', [
        'sass:materialize',
        'sass:otherSass',
        'copy'
    ])
};


