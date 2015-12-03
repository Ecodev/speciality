##########
# setup
##########

# Default User value
# @doc http://docs.typo3.org/typo3cms/TSconfigReference/UserTsconfig/Setup/Index.html
setup.defaults {
	titleLen = 80
	thumbnailsByDefault = 1
	edit_RTE = 1
	copyLevels = 9
	recursiveDelete = 1
	noOnChangeAlertInTypeFields = 0
	navFrameWidth = 150
	startModule = web_list
}

# Overridden User value
setup.override {
#	startModule = list
}

# http://snippets.typo3.org/c/10/
mod.web_list {
	hideTables=static_template,static_countries,static_country_zones,static_currencies,static_languages,static_territories,static_taxes,static_markets
	itemsLimitSingleTable = 1000
	itemsLimitPerTable = 50
}

tx_vidi {
	dataType {
		fe_users {
			storagePid = 29
		}

		fe_groups {
			storagePid = 29
		}
	}
}