<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TsConfig/Page/rte.ts">

mod.SHARED {
  defaultLanguageFlag = gb.gif
  defaultLanguageLabel = English
}

##########################
# Page default permissions
##########################

# Please confirm or infirm on github.com/Ecodev/typo3-cms-speciality-distribution/issues
# Some people report, it does not work unless this snippet is put on the root page TSconfig.
# @see https://github.com/Ecodev/typo3-cms-speciality-distribution/issues/113
TCEMAIN.permissions {

	# Configure default permission for new created pages.
	# do anything (default):
	user = show, editcontent, edit, new, delete

	# do anything (normally "delete" is disabled)
	group = show, editcontent, edit, new, delete

	# (normally everybody can do nothing)
	everybody =

	# user: default user
	# userid = 6

	# group _Users
	groupid = 1
}


###########
# TCE forms
###########

// Full screen for bodytext (tt_content)
TCEFORM.tt_content.bodytext.RTEfullScreenWidth= 100%


TCEFORM.tt_content.layout.altLabels {
	1 = Lightbox
	2 = Grey
}

TCEMAIN.table.tt_content {
	disablePrependAtCopy = 1
	disableHideAtCopy = 0
}

#########################################################
# Re-organize tabs within the new Content Element wizard
#########################################################

# no tabs as the list is fairly small.
mod.wizards.newContentElement.renderMode = NoTabs

# 1. common
mod.wizards.newContentElement.wizardItems.common.show = text

# 2. special
mod.wizards.newContentElement.wizardItems.special.show >

# 3. forms
mod.wizards.newContentElement.wizardItems.forms.show >

# 4. plugins
mod.wizards.newContentElement.wizardItems.plugins.show >

# 5. Bootstrap
mod.wizards.newContentElement.wizardItems.Bootstrap.show = FluidBT_Fluidbootstraptheme_Alert_html, FluidBT_Fluidbootstraptheme_Accordion_html, FluidBT_Fluidbootstraptheme_ImageGallery_html, FluidBT_Fluidbootstraptheme_Carousel_html
