###################################################
# Page header
###################################################

page = PAGE
page {

	headerData {
		# Facebook OpenGraph
		#27 = TEXT
		#27.data =  field : subtitle // field : title
		#27.wrap = <meta property="og:title" content="|&nbsp;&#124; {$config.productName}">

		#28 = TEXT
		#28.data = field : description
		#28.wrap = <meta property="og:description" content="|">
	}

	headTag(
<head>
	<meta name="viewport" content="width=device-width">

)
}

