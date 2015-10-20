<?php
/***************************
 * RealURL helper script
 ***************************/

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT'] = array(
	'init' => array(
		'enableCHashCache' => true,
		'appendMissingSlash' => 'ifNotFile',
		'adminJumpToBackend' => true,
		'enableUrlDecodeCache' => true,
		'enableUrlEncodeCache' => true,
		'emptyUrlReturnValue' => '/',
		// Allow for proper SEO 404 handling,
		'postVarSet_failureMode' => '',
		'reapplyAbsRefPrefix' => true,
	),
	#'redirects' => array(),
	'redirects_regex' => array(),
	'preVars' => array(
		array(
			'GETvar' => 'no_cache',
			'valueMap' => array(
				'no_cache' => 1,
			),
			'noMatch' => 'bypass',
		),
		array(
			'GETvar' => 'clear_cache'
		, 'valueMap' => array(
			'cc' => 1
		),
			'noMatch' => 'bypass'
		),

		// Language configuration
		array(
			'GETvar' => 'L',
			'valueMap' => array(
				// id's need to line up with Website Language Ids in TYPO3
				'' => '0',
				'fr' => '1',
				'de' => '2',
			),
			'noMatch' => 'bypass',
		),
	),
	'pagePath' => array(
		'type' => 'user',
		'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
		'spaceCharacter' => '-',
		'languageGetVar' => 'L',
		'rootpage_id' => 1,
		'segTitleFieldList' => 'tx_realurl_pathsegment,alias,title',
		'expireDays' => 7
	),
	'fixedPostVars' => array(),
	'postVarSets' => array(
		'_DEFAULT' => array(
			'login' => array(
				array('GETvar' => 'tx_newloginbox_pi3[showUid]')
			),
			'forgot-login' => array(
				array('GETvar' => 'tx_newloginbox_pi1[forgot]')
			),
			'forgot' => array(
				array('GETvar' => 'tx_felogin_pi1[forgot]')
			),
			'query' => array(
				array('GETvar' => 'tx_indexedsearch[sword]'),
				array('GETvar' => 'tx_indexedsearch[ext]'),
				array('GETvar' => 'tx_indexedsearch[submit_button]'),
				array('GETvar' => 'tx_indexedsearch[_sections]'),
				array('GETvar' => 'tx_indexedsearch[pointer]'),
				array('GETvar' => 'tx_indexedsearch[extResume]'),
				array('GETvar' => 'tx_indexedsearch[type]'),
				array('GETvar' => 'tx_indexedsearch[group]'),
				array('GETvar' => 'tx_indexedsearch[_freeIndexUid]'),
				array('GETvar' => 'tx_indexedsearch[media]'),
				array('GETvar' => 'tx_indexedsearch[defOp]'),
				array('GETvar' => 'tx_indexedsearch[ang]'),
				array('GETvar' => 'tx_indexedsearch[desc]'),
				array('GETvar' => 'tx_indexedsearch[results]'),
				array('GETvar' => 'tx_indexedsearch[sections]'),
				array('GETvar' => 'tx_indexedsearch[lang]'),
				array('GETvar' => 'tx_indexedsearch[order]'),
				array('GETvar' => 'tx_indexedsearch[freeIndexUid]')
			),
			'article' => array(
				array(
					'GETvar' => 'tx_news_pi1[news]',
					'lookUpTable' => array(
						'table' => 'tx_news_domain_model_news',
						'id_field' => 'uid',
						'alias_field' => 'title',
						'addWhereClause' => ' AND NOT deleted AND NOT hidden',
						'useUniqueCache' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-',
						),
					),
				),
			),
		)
	),
	'fileName' => array(
		'index' => array(
			'index.html' => array(
				'keyValues' => array(
					'type' => 0,
				)
			),
			// ext:seo_basics overrides this,
			'sitemap.xml' => array(
				'keyValues' => array(
					'type' => 776,
				)
			),
			'_DEFAULT' => array(
				'keyValues' => array()
			)
		),
		'defaultToHTMLsuffixOnPrev' => 0,
		'acceptHTMLsuffix' => 1
	),
);

/**
 * Edit rootpage_id to your website's root page UID
 */
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['pagePath']['rootpage_id'] = 1;
#$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['newsletter.domain.tld'] = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT'];
#$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['newsletter.domain.tld']['pagePath']['rootpage_id'] = 4;

/**
 * Edit for multiple languages
 */
if (false) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DOMAINS'] = array(
		'encode' => array(
			// English
			array(
				'GETvar' => 'L',
				'value' => '0',
				'useConfiguration' => 'example.com',
				'urlPrepend' => 'http://example.com'
			),
			// Traditional Chinese
			array(
				'GETvar' => 'L',
				'value' => '1',
				'useConfiguration' => 'example.com',
				'urlPrepend' => 'http://example.com.tw'
			),
			// Simplified Chinese
			array(
				'GETvar' => 'L',
				'value' => '2',
				'useConfiguration' => 'example.com',
				'urlPrepend' => 'http://example.com.cn'
			),
		),
		'decode' => array(
			// English
			'example.com' => array(
				'GETvars' => array(
					'L' => '0',
				),
				'useConfiguration' => 'example.com'
			),
			// Traditional Chinese
			'example.com.tw' => array(
				'GETvars' => array(
					'L' => '1',
				),
				'useConfiguration' => 'example.com'
			),
			// Simplified Chinese
			'example.com.cn' => array(
				'GETvars' => array(
					'L' => '2',
				),
				'useConfiguration' => 'example.com'
			),
		)
	);
}