module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},
			build: {
				src: '<%= pkg.jsLocation %>dist/push-menu.js',
				dest: '<%= pkg.jsLocation %>dist/push-menu.min.js',
			}
		},
		jshint: {
			files: [
				'js/**/*.js',
				'!**/*.min.js',
				'!node_modules/**',
				'!<%= pkg.jsLocation %>top.js',
				'!<%= pkg.jsLocation %>bottom.js',
				'!<%= pkg.jsLocation %>views.js',
				'!<%= pkg.jsLocation %>models.js',
			],
			options: {
				'trailing': true,
				'multistr': true,
				'unused': true,
				'strict': true,
				'browser': true,
				'eqeqeq': true,
			}
		},
		concat: {
			dist: {
				src: [
					'<%= pkg.jsLocation %>ml-push-menu.js',
					'<%= pkg.jsLocation %>top.js',
					'<%= pkg.jsLocation %>models.js',
					'<%= pkg.jsLocation %>collections.js',
					'<%= pkg.jsLocation %>views.js',
					'<%= pkg.jsLocation %>bottom.js',
				],
				dest: '<%= pkg.jsLocation %>dist/push-menu.js',
				nonull: true,
			},
		},
		watch: {
			js: {
				files: ['<%= concat.dist.src %>'],
				tasks: ['buildjs']
			}
		},
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-parallel');

	// Default task(s).
	grunt.registerTask('buildjs', ['concat', 'uglify']);
	grunt.registerTask('default', ['jshint', 'buildjs']);
	grunt.registerTask('dev', ['watch:js']);
};