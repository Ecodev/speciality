###################################################
# Plugin Page browser
###################################################

plugin.tx_pagebrowse_pi1 {

	# Template file
	#templateFile = fileadmin/templates/plugins/pagebrowse/template.html

	# Extra parameters to the query string. Must start with & if not empty
	extraQueryString =

	# Number of page links to show before the current page
	pagesBefore = 3

	# Number of page links to show before the current page
	pagesAfter = 3

	# GET variable name for page pointer. Examples: "page" or "tx_exykey_pi1|page". Notice that array separator is pipe (one level only!)
	pageParamName = tx_pagebrowse_pi1|page

	# Enables section for "more" pages. This section is shown after links to next pages, normally like three dots (1 2 3 ...). Notice that you can also hide it by emptying corresponding template section.
	enableMorePages = 1

	# Enables section for "less" pages. This section is shown after links to next pages, normally like three dots (1 2 3 ...) Notice that you can also hide it by emptying corresponding template section.
	enableLessPages = 1
}
