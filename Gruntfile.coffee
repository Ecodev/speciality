module.exports = (grunt) ->
	grunt.initConfig
		pkg: grunt.file.readJSON("package.json")
		dir:
			components: "Resources/Public/Components"
			build: "Resources/Public/Build"
			source: "Resources/Public/Source"
			temp: "Temporary"
			ext_jquerycolorbox: "../jquerycolorbox/res"

	############################ Assets ############################

	##
	# Assets: clean up environment
	##
		clean:
			temporary:
				src: ["Temporary"]

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
			images:
				files: [
					# includes files within path
					expand: true
					flatten: true
					src: [
						"<%= dir.temp %>/**"
					]
					dest: "<%= dir.build %>/Images/"
					filter: "isFile"
				]

	##
	# Assets: optimize assets for the web
	##
		pngmin:
			ext_jquerycolorbox:
				options:
					ext: '.png'
				files: [
					src: '<%= dir.ext_jquerycolorbox %>/css/images/*.png'
					dest: '<%= dir.temp %>'
				]
			images:
				options:
					ext: '.png'
				files: [
					src: '<%= dir.source %>/Images/*.png'
					dest: '<%= dir.temp %>'
				]

		gifmin:
			src: [
				'<%= dir.ext_jquerycolorbox %>/css/images/*.gif'
			],
			dest: '<%= dir.temp %>'

		jpgmin:
			src: [
				'<%= dir.ext_jquerycolorbox %>/css/images/*.jpg'
			],
			dest: '<%= dir.temp %>'

	############################ StyleSheets ############################

	##
	# StyleSheet: importation of "external" stylesheets form third party extensions.
	##
		import:
			jquerycolorbox:
				files:
					"<%= dir.temp %>/Source/colorbox.css": "<%= dir.ext_jquerycolorbox %>/css/*.css"
				options:
					replacements: [
						pattern: 'images/',
						replacement: '../Images/'
					]

	##
	# StyleSheet: compiling to CSS
	##
		sass: # Task
			build: # Target
				options: # Target options
				# output_style = expanded or nested or compact or compressed
					style: "expanded"

				files:
				# must comme last in the concatation process
					"<%= dir.temp %>/Source/zzz_main.css": "<%= dir.source %>/StyleSheets/Sass/main.scss"


	##
	# StyleSheet: minification of CSS
	##
		cssmin:
			options: {}
			build:
				files:
					"<%= dir.build %>/StyleSheets/site.min.css": [
						"<%= dir.temp %>/Build/*"
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
				banner: "/*! <%= pkg.name %> <%= grunt.template.today(\"dd-mm-yyyy\") %> */\n"
			dist:
				files:
					"<%= dir.temp %>/main.min.js": ["<%= jshint.files %>"]

	########## concat css + js ############
		concat:
			css:
				src: [
					"<%= dir.temp %>/Source/*.css"
					"<%= dir.source %>/StyleSheets/**/*.css"
				],
				dest: "<%= dir.temp %>/Build/site.css",
			options:
				separator: "\n"
			js:
				src: [
					"<%= dir.components %>/jquery/jquery.min.js"
					#"<%= dir.components %>/modernizr/modernizr.js" comment out if needed!!
					"<%= dir.components %>/bootstrap/dist/js/bootstrap.min.js"
					"<%= dir.ext_jquerycolorbox %>/js/jquery.colorbox-min.js"
					"<%= dir.ext_jquerycolorbox %>/js/main.js"
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
	grunt.loadNpmTasks "grunt-contrib-sass";
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
	grunt.registerTask "build-js", ["jshint", "uglify", "concat:js", "clean"]
	grunt.registerTask "build-css", ["sass", "concat:css", "import", "cssmin", "clean"]
	grunt.registerTask "build-icons", ["pngmin", "gifmin", "jpgmin","copy", "clean"]
	grunt.registerTask "css", ["build-css"]
	grunt.registerTask "js", ["build-js"]
	grunt.registerTask "icons", ["build-icons"]
	grunt.registerTask "default", ["help"]
	return