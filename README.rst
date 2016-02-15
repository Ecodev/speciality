Speciality
==========

Collection of configuration / templates for this website.

Fluid Content element
=====================

Credits: the Fluid content element where taken from the [Fluid Bootstrap theme](https://github.com/bootstraptheme-for-typo3/fluidbootstraptheme). The reason for that is we needed support for TYPO3 7 and the extension currently looks to be in an hibernation state.

Frontend Development Workflow
=============================

Here goes some explanation about **how to update the theme (CSS) along with the JavaScript** in this TYPO3 CMS distribution.
Before further reading, also consider a few words to give a bit of background:

**We develop locally and use Git and Composer as main deployment tools**. It serves our projects well. Our extensions are controlled by Composer
and thanks to the recent progress in this area every extension is now available in the form of a Composer Package at [composer.typo3.org](http://composer.typo3.org/).

Recently, I have experimenting some workflow based on `Phing`_, `Grunt`_ and `Bower`_. I found it nice:

- `Grunt`_: describes itself as the "JavaScript Task Runner". It is basically an automation tool enabling to quickly build advanced workflow
  Coming alongside with a rich ecosystem for all sort of needs.
  One of the handy feature, is the "watch" functionality which observes any changes made on the file system and triggers
  a build. This make the delivery process quite efficient and transparent. Additionally, the building process
  includes all sort of optimisation for the web such as minifying, compressing files.
  Also images get optimized by third party libraries done by the `Grunt Imagine`_ tasks

- `Bower`_: Package Manager for the web where package can be Web Components such a jQuery, Twitter Bootstrap, ...
  It makes pretty straightforward to cope with versions and dependencies of these Web Components.
  For instance, starting a new project, you certainly want to have your libraries up to date.
  Bower will scan and let you know which library must be upgraded. Awesome!

Notice also the new file structure of the `Public`_ directory::

	ls -l Resources/Public

	├── / (1)
	├── /Source (2)
	├── /BowerComponents (3)

1. the generated output optimized for production. Never edit files as they will be overridden.
2. Source: everything that we produce as code that includes the raw Sass, JavaScript, images comes here.
3. Components: Web Components managed by Bower. The directory is not under Git though, since it is replicable.

Alright, time for getting hands dirty! Assuming, you have installed the Bootstrap Package, find some instructions how to get started
with this development workflow::

	# Head to EXT:speciality
	cd typo3conf/ext/speciality

	# Make sure to have bower installed
	# If bower is not installed
	# (sudo) npm install -g bower
	bower --version

	# Make sure to have grunt installed
	# If Grunt ist not installed
	# (sudo) npm install -g grunt-cli
	grunt --version

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

.. _Phing: https://www.phing.info/
.. _Grunt: http://gruntjs.com/
.. _Bower: http://bower.io/
.. _SVN archive: https://github.com/TYPO3-svn-archive/
.. _Public: https://github.com/Ecodev/bootstrap_package/tree/master/htdocs/typo3conf/ext/speciality/Resources/Public
.. _Grunt Imagine: https://github.com/asciidisco/grunt-imagine
