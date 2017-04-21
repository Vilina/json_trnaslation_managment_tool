module.exports = function(grunt){
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        connect: {
            livereload: {
                options: {
                    open: true,
                    middleware: function(connect){
                        return [
                            require('connect-livereload')(), // <--- here
                            checkForDownload,
                            mountFolder(connect, '.tmp'),
                            mountFolder(connect, 'app')
                        ];
                    }
                }
            }
        },
        watch: {
            options: {
                livereload: 'true'
            },
            livereload: {
                files: [
                    '../stylesheets/scss/**/*',
                    '../js/app.js',
                    '../*.php'
                ],
                tasks: ['sass:materialize','sass:otherSass','copy']
            },
            html_files: {
                files: ['./index.php'],
                tasks: [] // Only being watched to
                          // perform live reload,
                          // no associated tasks
            }
        },


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
        concat: {
            js: {
                files: {
                    '../js/vendor.js': ['node_modules/angular/angular.js',
                                        'node_modules/jsoneditor/dist/jsoneditor.min.js']
                }
            },
            css:{
                src : [
                    'node_modules/jsoneditor/dist/jsoneditor.min.css'
                ],
                dest: '../stylesheets/css/vendor.css'
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
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.registerTask('default', [
        'sass:materialize',
        'sass:otherSass',
        'concat',
        'copy',
        'watch'
    ])
};


