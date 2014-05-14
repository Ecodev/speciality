###################################################
# Plugin News
###################################################
plugin.tx_news {

	# Allow more than one plugin on the same page with different views (actions)
	mvc.callDefaultActionIfActionCantBeResolved = 1

	/**
	 * Change the template, partial and layout root path so we can customize it.
	 * All folders are copies of the ones from EXT:news/Resources/Private/
	*/
	#view {
	#	templateRootPath = EXT:news/Resources/Private/News/Templates/
	#	partialRootPath = EXT:news/Resources/Private/News/Partials/
	#	layoutRootPath = EXT:news/Resources/Private/News/Layouts/
	#}

	settings {
		# do not display a dummy image if the record does not contain an image
		displayDummyIfNoMedia = 0

		# settings for list view
		list {
			media {
				# limit image sizes (px)
				image {
					maxWidth = 175
					maxHeight = 175
				}
			}
		}

		# settings for detail view
		detail {
			media {
				# limit image sizes (px)
				image {
					maxWidth = 250
					maxHeight = 300
				}
			}
		}
	}
}