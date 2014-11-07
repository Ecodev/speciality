<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TsConfig/Page/rte.ts">

mod.SHARED {
  defaultLanguageFlag = gb.gif
  defaultLanguageLabel = English
}

# PAGE DEFAULT PERMISSIONS

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
