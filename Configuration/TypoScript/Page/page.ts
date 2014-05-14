################
# page
################

# Notice:
# page object is instantiated from EXT:fluidpages/Configuration/TypoScript/setup.txt

page {
	# enhanced body with class="page-x"
	bodyTag >
	bodyTagCObject = TEXT
	bodyTagCObject.field = uid
	bodyTagCObject.wrap = <body class="page-|">
    adminPanelStyles = 0
}

# remove class bodytext
lib.parseFunc_RTE.nonTypoTagStdWrap.encapsLines.addAttributes.P.class >