###################################################
# Footer
###################################################

# Using a content object "RECORDS" for fetching content from the DB
# @see more content objects http://docs.typo3.org/typo3cms/TyposcriptReference/ContentObjects/Index.html
lib.footer = RECORDS
lib.footer {
	# Correspond to uid 294 of table "tt_content"
	source = 294
    tables = tt_content
}
