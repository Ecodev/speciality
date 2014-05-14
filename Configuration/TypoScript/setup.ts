###################################################
# Include all TypoScript files
###################################################

# TypoScript configuration coming from third-party extensions.
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:css_styled_content/static/setup.txt">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:seo_basics/static/setup.txt">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluidpages/Configuration/TypoScript/setup.txt">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluidcontent/Configuration/TypoScript/setup.txt">
#<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluidcontent_core/Configuration/TypoScript/setup.txt">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluidcontent_bootstrap/Configuration/TypoScript/setup.txt">

# Configuration
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Config/language.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Config/config.ts">

# Lib
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Lib/footer.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Lib/menu.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Lib/disqus.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Lib/addthis.ts">

# Plugin
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Plugin/tx_cssstyledcontent.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Plugin/tx_form.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Plugin/tx_indexedsearch.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Plugin/tx_news.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Plugin/tx_pagebrowse.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Plugin/tx_seobasics.ts">

# Content
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Content/tt_content.ts">

# Page
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Page/header.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:speciality/Configuration/TypoScript/Page/page.ts">
