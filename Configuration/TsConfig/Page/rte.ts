/**
 * Rich Text Editor Setup
 *
 * @author Fabien Udriot <fabien.udriot@ecodev.ch>
 */
RTE {

	// Default RTE configuration (all tables)
	default {

		// Default target for links
		defaultLinkTarget = _top

		// Buttons to show
		showButtons = *

		// Toolbar order
		toolbarOrder = formatblock, blockstyle, textstyle, linebreak, bold, italic, underline, strikethrough, bar, textcolor, bgcolor, bar, orderedlist, unorderedlist, bar, left, center, right, justifyfull, linebreak, copy, cut, paste, bar, undo, redo, bar, findreplace, removeformat, bar, link, unlink, linkcreator, bar, imageeditor, bar, table, bar, line, bar, insertparagraphbefore, insertparagraphafter, bar, chMode, showhelp, about, linebreak, tableproperties, rowproperties, rowinsertabove, rowinsertunder, rowdelete, rowsplit, columninsertbefore, columninsertafter, columndelete, columnsplit, cellproperties, cellinsertbefore, cellinsertafter, celldelete, cellsplit, cellmerge

		RTEHeightOverride = 700
		RTEWidthOverride = 700

		//hide / show HTML tag
		buttons.formatblock.orderItems = h1, h2, h3, h4, h5, h6, p, article, section, quotation

		// Make possible to read classes from the rte.css file
		buttons.textstyle.tags.span.allowedClasses >
		buttons.textstyle.tags.REInlineTags >
		buttons.textstyle.REInlineTags >
		buttons.blockstyle.tags.table.allowedClasses >

		// Disable contextual menu
		contextMenu.disabled = 1

		// Display status bar
		showStatusBar = 1

		// RTE stylesheet
		contentCSS = EXT:speciality/Resources/Public/Source/StyleSheets/Site/rte.css

		// Remove HTML tags and their content
		removeTagsAndContents =

		// Use CSS formatting when possible
		useCSS = 1

		// Processing rules
		proc {

			// Allowed Classes to be saved
			allowedClasses  < RTE.default.classesCharacter

			// Transformation method
			overruleMode = ts_css

			// Do not convert BR into linebreaks
			dontConvBRtoParagraph = 1

			// Map paragraph tag
			remapParagraphTag = p

			// Tags allowed
			allowTags = a, abbr, acronym, address, blockquote, b, br, caption, center, cite, code, div, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, link, ol, p, pre, q, sdfield, span, strike, strong, sub, sup, table, thead, tbody, tfoot, td, th, tr, tt, u, ul

			// Tags denied
			denyTags >

			// Attributes to keep for P & DIV
			keepPDIVattribs = xml:lang,class,style,align

			// Tags allowed outside P & DIV
			allowTagsOutside = img,hr,table,tr,th,td,h1,h2,h3,h4,h5,h6,br,ul,ol,li,pre,address,span

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
RTE.default.FE < RTE.default