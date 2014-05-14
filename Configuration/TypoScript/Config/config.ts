###################################################
# Config
###################################################

config {

	# How to handle localization, possible values:
	# content_fallback: the system will always operate with the selected language even if the page is not translated with a page overlay record.
	# strict: the system will report an error if the requested translation does not exist
	# ignore: the system will stay with the selected language even if the page is not translated
	# @todo fix me! it looks the setting is not taken into account with latest version of fedext
	# sys_language_mode = content_fallback

	# Records that are not localized till be hidden
	# Possible value hideNonTranslated | int (the sys_language)
	# @todo fix me! it looks the setting is not taken into account with latest version of fedext
	#sys_language_overlay = hideNonTranslated

	# If set, the stdWrap property “prefixComment” will be disabled, thus preventing any revealing and space-consuming comments in the HTML source code.
	disablePrefixComment = 1

	# If set, the inline styles TYPO3 controls in the core are written to a file
	inlineStyle2TempFile = 1

	# Charset, should always be utf-8
	renderCharset = utf-8

	#
	metaCharset = utf-8

	# Setting up the language variable "L" to be passed along with links
	linkVars = L(int), print

	# Doctype html5 for Boilerplate from Paul Irish
	# Not working with EXT:css_styled_content which requires doctype=html5
#	doctype (
#<!doctype html>
#<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="{$config.language}"> <![endif]-->
#<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="{$config.language}"> <![endif]-->
#<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="{$config.language}"> <![endif]-->
#<!--[if IE 9]>    <html class="no-js ie9" lang="{$config.language}">       <![endif]-->
#<!--[if gt IE 9]><!-->
#)
#	htmlTag_setParams = lang="{$config.language}" class="no-js"><!--<![endif]--

	# html5? Yeah!
	doctype = html5

	# htmlTag_setParams
	htmlTag_setParams = lang="{$config.language}" class="no-js"

	# XML? Not that!
	xmlprologue = none

	#
	prefixLocalAnchors = all

	# The <base> tag in the header of the document which is used by RealURL
	# Not set for the time being to stay portable
	#baseURL = http://{$config.domain}/

	# For pages
	index_enable = {$config.index_enable}

	# For documents
	index_externals = {$config.index_externals}

	#
	index_metatags = 0

	# If set, then every “typolink” is checked whether it's linking to a page within the current rootline of the site.
    typolinkCheckRootline = 1

    # This option enables to create links across domains using current domain's linking scheme.
    typolinkEnableLinksAcrossDomains = 1

    # Spam protection
    spamProtectEmailAddresses = ascii

    #
	spamProtectEmailAddresses_atSubst = (at)

	#
	spamProtectEmailAddresses_lastDotSubst = (dot)

    # Enable RealURL
    tx_realurl_enable = 1

    #
    sendCacheHeaders = 1

    #
	content_from_pid_allowOutsideDomain = 1

	#
	pageTitleFirst = 0


	# If this value is set, then all relative links in TypoScript are prepended with this string.
	# Used to convert relative paths to absolute paths.
	absRefPrefix = /

	#
	#headerComment = Integration and development - http://example.com/
}
