################
# page
################

# Notice:
# page object is instantiated in EXT:fluidpages/Configuration/TypoScript/setup.txt

page {
	# enhanced body with class="page-x"
	bodyTag >
	bodyTagCObject = TEXT
	bodyTagCObject.field = uid
	bodyTagCObject.wrap = <body class="page-|">
	adminPanelStyles = 0
	meta.viewport  = width=device-width, initial-scale=1
}
