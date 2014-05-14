###################################################
# Plugin CSS Styled Content
###################################################

# Remove default CSS of css_styled_content
plugin.tx_cssstyledcontent._CSS_DEFAULT_STYLE >

# Configure table
lib.parseFunc_RTE {
	externalBlocks {
		table.stdWrap.HTMLparser.tags.table.fixAttrib.class {
			default = table table-striped table-hover table-condensed
			always = 1
			list >
		}
	}
}

# This will place an anchor link besides the h1 menu
lib.stdheader {

	# Reset config
	10 >

	# This CASE cObject renders the header content:
	# currentValue is set to the header data, possibly wrapped in link-tags.
	10 = CASE
	10.setCurrent {
		field = header
		htmlSpecialChars = 1
		typolink.parameter.field = header_link
	}
	10.key.field = header_layout
	10.key.ifEmpty = {$content.defaultHeaderType}
	10.key.ifEmpty.override.data = register: defaultHeaderType

	10.1 = COA
	10.1.wrap = <h1>|</h1>
	10.1 {
		1 = TEXT
		1.current = 1
		1.dataWrap = |

		# Add more configuration
		2 = TEXT
		2.field = uid
		2.postUserFunc = TYPO3\CMS\Speciality\Content\MenuAnchor->main
	}

	10.2 = TEXT
	10.2.current = 1
	10.2.dataWrap = <h2{register:headerClass}>|</h2>

	10.3 < .10.2
	10.3.dataWrap = <h3{register:headerClass}>|</h3>

	10.4 < .10.2
	10.4.dataWrap = <h4{register:headerClass}>|</h4>

	10.5 < .10.2
	10.5.dataWrap = <h5{register:headerClass}>|</h5>
}