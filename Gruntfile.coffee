module.exports = (grunt) ->
	grunt.initConfig
		pkg: grunt.file.readJSON("package.json")
		dir:
			components: "Resources/Private/BowerComponents"
			build: "Resources/Public"
			source: "Resources/Private/Assets"
			temp: "Temporary"

	# JavaScript files
		js:
			for_production: [
				"<%= dir.components %>/jquery/dist/jquery.min.js"
				#"<%= dir.components %>/modernizr/modernizr.js" comment out if needed!!
				"<%= dir.components %>/bootstrap/dist/js/bootstrap.min.js"
			]
			raw_files: [
				"<%= jshint.files %>"
			]
			for_development: [
				"<%= dir.components %>/jquery/dist/jquery.js"
				#"<%= dir.components %>/modernizr/modernizr.js" comment out if needed!!
				"<%= dir.components %>/bootstrap/dist/js/bootstrap.js"
			]

	# CSS files
		css:
			raw_files: [
				#"<%= dir.components %>/jQuery-Validation-Engine/css/validationEngine.jquery.css"
				#"<%= dir.components %>/jquery.ui/themes/base/core.css"
				#"<%= dir.components %>/jquery.ui/themes/base/theme.css"
				"<%= dir.build %>/StyleSheets/rte.css"
			]

	############################ Assets ############################

	##
	# Assets: clean up environment
	##
		clean:
			temporary:
				src: ["<%= dir.temp %>"]

	##
	# Assets: copy some files to the distribution dir
	##
		copy:
			fonts:
				files: [
					# includes files within path
					expand: true
					flatten: true
					src: [
						"<%= dir.components %>/bootstrap/fonts/*"
						"<%= dir.components %>/font-awesome/fonts/*"
					]
					dest: "<%= dir.build %>/Fonts/"
					filter: "isFile"
				]

	##
	# Assets: optimize assets for the web
	##
		pngmin:
			images:
				options:
					ext: '.png'
				files: [
					src: '<%= dir.source %>/Images/*.png'
					dest: "<%= dir.build %>/Images/"
				]

		gifmin:
			src: [
				src: '<%= dir.source %>/Images/*.gif'
			],
			dest: "<%= dir.build %>/Images/"

		jpgmin:
			src: [
				src: '<%= dir.source %>/Images/*.jpg'
			],
			dest: "<%= dir.build %>/Images/"

	############################ StyleSheets ############################

	##
	# Use me if needed!
	# StyleSheet: importation of "external" stylesheets form third party extensions.
	##
#		import:
#			jquerycolorbox:
#				files:
#					"<%= dir.temp %>/Source/colorbox.css": "<%= dir.ext_jquerycolorbox %>/css/*.css"
#				options:
#					replacements: [
#						pattern: 'images/',
#						replacement: '../Images/'
#					]

	##
	# StyleSheet: compiling to CSS
	##
		sass: # Task
			build: # Target
				options: # Target options
				# output_style = expanded or nested or compact or compressed
					style: "expanded"

				files:
				# must come last in the concatenation chain.
					"<%= dir.temp %>/Source/zzz_main.css": "<%= dir.source %>/StyleSheets/Sass/main.scss"


	##
	# StyleSheet: minification of CSS
	##
		cssmin:
			options: {}
			build:
				files:
					"<%= dir.build %>/StyleSheets/site.min.css": [
						"<%= dir.build %>/StyleSheets/site.css"
					]

	############################ JavaScript ############################

	##
	# JavaScript: check javascript coding guide lines
	##
		jshint:
			files: [
				"<%= dir.source %>/JavaScript/*.js"
			]

			options:
			# options here to override JSHint defaults
				curly: true
				eqeqeq: true
				immed: true
				latedef: true
				newcap: true
				noarg: true
				sub: true
				undef: true
				boss: true
				eqnull: true
				browser: true
				globals:
					jQuery: true
					console: true
					module: true
					document: true
					Modernizr: true

	##
	# JavaScript: minimize javascript
	##
		uglify:
			options:
				banner: "/*! <%= pkg.name %> <%= grunt.template.today(\"dd-mm-yyyy\") %> */\n\n"
			dist:
				files:
#					"<%= dir.build %>/JavaScript/site.min.js": [
#						"<%= dir.build %>/JavaScript/site.js"
#					]
					"<%= dir.temp %>/main.min.js": ["<%= jshint.files %>"]

	########## concat css + js ############
		concat:
			css:
				src: [
					"<%= dir.temp %>/Source/*.css"
					"<%= css.raw_files %>"
				],
				dest: "<%= dir.build %>/StyleSheets/site.css",
			options:
				separator: "\n\n"
			js_dev:
				src: [
					"<%= js.for_development %>"
					"<%= js.raw_files %>"
				]
				dest: "<%= dir.build %>/JavaScript/site.js"
			js_prod:
				src: [
					"<%= js.for_production %>"
					"<%= dir.temp %>/main.min.js"
				]
				dest: "<%= dir.build %>/JavaScript/site.min.js"

	########## Watcher ############
		watch:
			css:
				files: [
					"<%= dir.source %>/StyleSheets/**/*.scss"
					"<%= dir.source %>/StyleSheets/**/*.css"
				]
				tasks: ["build-css"]
			js:
				files: ["<%= jshint.files %>"]
				tasks: ["build-js"]


	########## Help ############
	grunt.registerTask "help", "Just display some helping output.", () ->
		grunt.log.writeln "Usage:"
		grunt.log.writeln ""
		grunt.log.writeln "- grunt watch        : watch your file and compile as you edit"
		grunt.log.writeln "- grunt build        : build your assets ready to be deployed"
		grunt.log.writeln "- grunt build-css    : only build your css files"
		grunt.log.writeln "- grunt build-js     : only build your js files"
		grunt.log.writeln "- grunt build-icons  : only build icons"
		grunt.log.writeln ""
		grunt.log.writeln "Use grunt --help for a more verbose description of this grunt."
		return

	# Load Node module
	grunt.loadNpmTasks "grunt-contrib-uglify"
	grunt.loadNpmTasks "grunt-contrib-jshint"
	grunt.loadNpmTasks "grunt-contrib-watch"
	grunt.loadNpmTasks "grunt-contrib-concat"
	grunt.loadNpmTasks "grunt-sass";
	grunt.loadNpmTasks "grunt-contrib-cssmin"
	grunt.loadNpmTasks "grunt-contrib-copy"
	grunt.loadNpmTasks "grunt-contrib-clean"
	grunt.loadNpmTasks "grunt-string-replace"
	grunt.loadNpmTasks "grunt-imagine"
	grunt.loadNpmTasks "grunt-pngmin"

	# Alias tasks
	grunt.task.renameTask("string-replace", "import")

	# Tasks
	grunt.registerTask "build", ["build-js", "build-css", "build-icons"]
	grunt.registerTask "build-js", ["jshint", "uglify", "concat:js_dev", "concat:js_prod", "clean"]
	grunt.registerTask "build-css", ["sass", "concat:css", "cssmin", "clean"]
	grunt.registerTask "build-icons", ["pngmin", "clean"]
	grunt.registerTask "css", ["build-css"]
	grunt.registerTask "js", ["build-js"]
	grunt.registerTask "icons", ["build-icons"]
	grunt.registerTask "default", ["help"]
	return