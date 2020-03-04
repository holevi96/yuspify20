/**
 * Gruntfile for task automation.
 * Includes js minify and less compiling.
 * @author György Herbszt
 */
module.exports = function (grunt) {
    "use strict";
    require('jit-grunt');

    grunt.initConfig({
        uglify: {
            my_target: {
                options: {
                    sourceMap: true
                },
                files: {
                    'wp-content/themes/yuspify/dist/yuspify.min.js': [
                        'wp-content/themes/yuspify/js/main.js',
                        'wp-content/themes/yuspify/js/pricing.js',
                        'wp-content/themes/yuspify/js/uiComponents.js',
                        'wp-content/themes/yuspify/js/pricing/nouislider.js',
                        'wp-content/themes/yuspify/js/pricing/wNumb.js',
                        'wp-content/themes/yuspify/js/pricing/uiProgressButton.js',
                        'wp-content/themes/yuspify/js/pricing/pricing_script.js'
                    ]
                }
            }
        },
        less: {
            development: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2,
                    sourceMap: true,
                    sourceMapURL: 'yuspify.min.css.map',
                    sourceMapRootpath: '../../../'
                },
                files: [
                    { 'wp-content/themes/yuspify/dist/yuspify.min.css': 'wp-content/themes/yuspify/less/yuspify.less' },
                    { 'wp-content/themes/yuspify/dist/yfy-above-the-fold.min.css': 'wp-content/themes/yuspify/less/above-the-fold.less' }
                ]
            }
        },
        watch: {
            scripts: {
                files: 'wp-content/themes/yuspify/js/**/*.js',
                tasks: ['uglify'],
                options: {
                    interrupt: true
                }
            },
            styles: {
                files: ['wp-content/themes/yuspify/less/**/*.less'],
                tasks: ['less'],
                options: {
                    nospawn: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('js', ['uglify']);
    grunt.registerTask('default', ['uglify', 'less', 'watch']);
};