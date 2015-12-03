##########
# module
##########

# http://snippets.typo3.org/c/10/
mod.web_list {
	hideTables=static_template,static_countries,static_country_zones,static_currencies,static_languages,static_territories,static_taxes,static_markets
	itemsLimitSingleTable = 1000
	itemsLimitPerTable = 50
}

#@todo rename mod.tx_vidi
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