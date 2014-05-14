###################################################
# Plugin Index Search
###################################################

plugin.tx_indexedsearch {

	templateFile = EXT:speciality/Resources/Private/Plugin/IndexedSearch/SearchForm.html
	_CSS_DEFAULT_STYLE >
	_DEFAULT_PI_VARS.results = 10
	forwardSearchWordsInResultLink = 1
	blind {
		type=-1
		defOp=0
		sections=0
		media=1
		order=-1
		group=-1
		extResume=-1
		lang=-1
		desc=-1
		results=0
	}
	show {
		rules=0
		parsetimes=1
		L2sections=1
		L1sections=1
		LxALLtypes=0
		clearSearchBox = 0
		clearSearchBox.enableSubSearchCheckBox=0
		advancedSearchLink = 0
	}
	search {
		rootPidList =
	}
	#templateFile = fileadmin/templates/plugins/indexed_search/searchresult.html
}