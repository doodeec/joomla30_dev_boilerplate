'use strict';

module.exports = function (grunt) {

    require('load-grunt-tasks')(grunt);
    require('time-grunt')(grunt);
    require('grunt-devtools')(grunt);

    grunt.initConfig({
        // Add vendor prefixed styles
        autoprefixer: {
            options: {
                browsers: ['last 3 version']
            },
            dist: {
                files: [
                    {
                        expand: true,
                        cwd: 'css/',
                        src: '{,*/}*.css',
                        dest: 'css/'
                    }
                ]
            }
        },
        compass: {
            dist: {
                options: {
                    sassDir: 'sass',
                    cssDir: 'css',
                    environment: 'production'
                },
                files: []
            }
        }
    });

    grunt.registerTask('build', [
        'compass',
        'autoprefixer'
    ]);

    grunt.registerTask('default', [
        'build'
    ]);
};
