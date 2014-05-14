###################################################
# TypoScript: constants
###################################################

# TypoScript constants coming from third-party extensions.
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:css_styled_content/static/constants.txt">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:seo_basics/static/constants.txt">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluidpages/Configuration/TypoScript/constants.txt">
# No constants for EXT:fluidcontent
#<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluidcontent_core/Configuration/TypoScript/constants.txt">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluidcontent_bootstrap/Configuration/TypoScript/constants.txt">

config {

	# cat=site-configuration/content/0100; type=text; label= Domain (FQDN)
	#domain = example.com

	# cat=site-configuration/content/0140; type=int; label= Rootpage Uid
	rootPid = 1

	# cat=site-configuration/content/0150; type=int; label= Enable the Index Search extension
	index_enable = 1

	# cat=site-configuration/content/0151; type=int; label= Enable the Index Search extension to index file
	index_externals = 0
}

styles.content {
	imgtext.maxWInText = 0
	imgtext.linkWrap.width = 800
	loginform.pid = 0
	media.defaultVideoWidth = 960
	imgtext.maxW = 960
}


# Language
config {
	language = en
}

[globalVar = GP:L = 1]
	config {
		language = fr
	}
[end]

[globalVar = GP:L = 2]
	config {
		language = de
	}
[end]

# Enable light box
styles.content.imgtext.linkWrap.lightboxEnabled = 1