Speciality
==========

Collection of configuration / templates for this website.


Frontend Development Workflow
=============================

Here goes some explanation about **how to update the design along with the JavaScript** in this TYPO3 CMS distribution.
Before further reading, also consider a few assertion to give a bit of background:

* I develop locally and use Git as the main deployment tool for the source code. It serves our projects good enough.
  Third party TYPO3 extensions are in sub-modules for now but I am hoping it could be handed by Composer in a close future.
  Normally, every extensions from the Forge has its mirror on the `SVN archive`_  at Github.
* For synchronising the database and the files, I am using some Phing tasks that you can find in this project as well in ``/build/Phing``

Recently, I have experimenting some workflow based on `Phing`_, `Grunt`_ and `Bower`_. I found it cool enough to be shared.
Very briefly, a few words about those tools if you are not familiar with them:

- `Grunt`_: describes itself as the "JavaScript Task Runner". It is basically an automation tool enabling to quickly build advanced workflow
  Coming alongside with a rich ecosystem for all sort of needs.
  One of the handy feature, is the "watch" functionality which observes any changes made on the file system and triggers
  a build. This make the delivery process quite efficient and transparent. Additionally, the building process
  includes all sort of optimisation for the web such as minifying, compressing the files.
  Also images are optimized and size get shrunk by third party libraries which is basically done by the `Grunt Imagine`_ tasks
  Coming from the PHP world, I took about a day to dig into the tool and considered as a useful investment so far...

- `Bower`_: Package Manager for the web where package can be Web Components such a jQuery, Twitter Bootstrap, ...
  It makes pretty straightforward to cope with versions and dependencies of these Web Components.
  For instance, starting a new project, you certainly want to have your libraries up to date.
  Bower will scan and let you know which library must be upgraded. I am already rejoiced not to hunt down this kind of information by myself!

Notice also the new file structure of the `Public`_ directory::

	ls -l Resources/Public

	├── Build (1)
	└── Source (2)
	├── Components (3)

1. Build: the generated output optimized for production. Never edit files as they will be overridden.
2. Source: everything that we produce as code that includes the raw Sass, JavaScript, images comes here.
3. Components: Web Components managed by Bower. The directory is not under Git though, since it is replicable.

Alright, time for getting hands dirty! Assuming, you have installed the Bootstrap Package, find some instructions how to get started
with this development workflow::

	# Head to EXT:speciality
	cd typo3conf/ext/speciality

	# Make sure to have bower installed
	bower --version

	# If bower is not installed
	(sudo) npm install -g bower

	# Make sure to have grunt installed
	grunt --version

	# If Grunt ist not installed
	(sudo) npm install -g grunt-cli

	# Install local grunt modules
	npm install

	# Install Web Components (jQuery, ...)
	bower install

	# Check whether Web Components need to be updated.
	# The command will display the current version and the latest version available besides.
	bower list

	# If needed update Web Components versions.
	edit bower.json
	bower update

	# Call grunt help
	grunt help

	# Generate a new build including JavaScript, CSS, optimized images, ...
	grunt build

	# Watch your asset and compile them as you edit them.
	grunt watch

.. _Grunt: http://gruntjs.com/
.. _Bower: http://bower.io/
.. _SVN archive: https://github.com/TYPO3-svn-archive/
.. _Public: https://github.com/Ecodev/bootstrap_package/tree/master/htdocs/typo3conf/ext/speciality/Resources/Public
.. _Grunt Imagine: https://github.com/asciidisco/grunt-imagine
