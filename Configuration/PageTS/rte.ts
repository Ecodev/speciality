/**
 * Rich Text Editor Setup
 */
RTE {

	// Explicit class names
	classes {

		table {
			name = Base
		}

		table-striped {
			name = Striped rows
		}

		table-bordered {
			name = Bordered table
		}

		table-hover {
			name = Hover rows
		}

		table-condensed {
			name = Condensed table
		}

		table-responsive {
			name = Responsive table
		}

		code {
			name = Code
		}

		read-more {
			name = Read more
		}
	}

	// Default RTE configuration.
	default {

		## MS Word cleaning
		enableWordClean = 1

		## Remove HTML comments
		removeComments = 1

		## Remove HTML tags
		removeTags = center, font, o:p, sdfield, strike, u

		## Remove HTML tags and their content
		removeTagsAndContents = link, meta, script, title

		## Remove trailing BR if any
		removeTrailingBR = 1

		## Tags allowed outside <p> and <div> tags
		allowTagsOutside (
			address, br, dd, dl, dt, h1, h2, h3, h4, h5, hr, img, li, ol,
			pre, table, tr, th, td, ul
		)

		# For clean copy / paste
		buttons.pastetoggle.setActiveOnRteOpen = 1
		buttons.pastetoggle.hidden = 1

		// Default target for links
		defaultLinkTarget = _top

		// Buttons to show
		showButtons = *

		// Toolbar order
		toolbarOrder = formatblock, blockstyle, textstyle, linebreak, bold, italic, underline, strikethrough, bar, textcolor, bgcolor, bar, orderedlist, unorderedlist, bar, left, center, right, justifyfull, linebreak, copy, cut, paste, bar, undo, redo, bar, findreplace, pastetoggle, removeformat, bar, link, unlink, linkcreator, bar, imageeditor, bar, table, bar, line, bar, insertparagraphbefore, insertparagraphafter, bar, chMode, showhelp, about, linebreak, tableproperties, rowproperties, rowinsertabove, rowinsertunder, rowdelete, rowsplit, columninsertbefore, columninsertafter, columndelete, columnsplit, cellproperties, cellinsertbefore, cellinsertafter, celldelete, cellsplit, cellmerge

		RTEHeightOverride = 700
		RTEWidthOverride = 700

		//hide / show HTML tag
		buttons.formatblock.orderItems = h1, h2, h3, h4, h5, h6, p, article, section, quotation

		// Make possible to read classes from the rte.css file
		buttons.textstyle.tags.span.allowedClasses >
		buttons.textstyle.tags.span.allowedClasses = detail, important, code, read-more
		buttons.blockstyle.tags.table.allowedClasses >
		buttons.blockstyle.tags.table.allowedClasses = table, table-striped, table-bordered, table-hover, table-condensed, table-responsive

		# Specify the maximum width of an image, default is 300.
		buttons.image.options.magic.maxWidth = 760

		// Disable contextual menu
		contextMenu.disabled = 1

		// Display status bar
		showStatusBar = 1

		// RTE stylesheet
		contentCSS = EXT:speciality/Resources/Public/StyleSheets/rte.css

		// Remove HTML tags and their content
		removeTagsAndContents =

		// Use CSS formatting when possible
		useCSS = 0

		// Processing rules
		proc {

			// Allowed * classes to be saved
			allowedClasses := addToList(table, table-striped, table-bordered, table-hover, table-condensed, table-responsive, code, read-more)

			// Transformation method
			overruleMode = ts_css

			// Do not convert BR into linebreaks
			dontConvBRtoParagraph = 1

			// Map paragraph tag
			remapParagraphTag = p

			// Tags denied
			denyTags >

			// Attributes to keep for P & DIV
			keepPDIVattribs = xml:lang,class,style,align

			// Tags allowed in Typolists
			allowTagsInTypolists = br,font,b,i,u,a,img,span

			// Keep unknown tags
			dontRemoveUnknownTags_db = 1

			// Allow tables
			preserveTables = 1

			// Entry HTML parser
			entryHTMLparser_db = 1
			entryHTMLparser_db {

				// Tags allowed
				allowTags < RTE.default.proc.allowTags

				// Tags denied
				denyTags >

				// HTML special characters
				htmlSpecialChars = 0

				// Allow IMG tags
				tags.img >

				// Additionnal attributes for P & DIV
				tags.div.allowedAttribs = class,style,align
				tags.p.allowedAttribs = class,style,align

				// Tags to remove
				removeTags = center, font, o:p, sdfield, strike, u

				// Keep non matched tags
				keepNonMatchedTags = protect
			}

			// HTML parser
			HTMLparser_db {

				// Strip attributes
				noAttrib = br

				// XHTML compliance
				xhtml_cleaning = 1
			}

			// Exit HTML parser
			exitHTMLparser_db = 1
			exitHTMLparser_db {

				// Remap bold and italic
				tags.b.remap = strong
				tags.i.remap = em

				// Keep non matched tags
				keepNonMatchedTags = 1

				// HTML special character
				htmlSpecialChars = 0
			}
		}
	}
}

// Frontend RTE configuration
RTE.default.FE >
RTE.default.FE < RTE.default

// For the Frontend purpose, so that image config about "maxWidth" is propagated.
RTE.buttons.image < RTE.default.buttons.image