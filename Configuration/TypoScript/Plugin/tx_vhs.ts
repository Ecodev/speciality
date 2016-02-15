###################################################
# Plugin VHS
###################################################

plugin.tx_vhs.settings.asset {
	mainCss {
		path = EXT:speciality/Resources/Public/StyleSheets/site.min.css
		group = css
		standalone = 1
		rewrite = 0
		type = css
	}

	rteCss {
		// to-do: could be merged into site.min.css in the Grunt build chain.
		path = EXT:speciality/Resources/Public/StyleSheets/rte.min.css
		dependencies = mainCss
		type = css
	}

	mainJs {
		path = EXT:speciality/Resources/Public/JavaScript/site.min.js
		group = js
		standalone = 1
		rewrite = 0
		type = js
	}
}
