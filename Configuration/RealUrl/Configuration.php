<?php
/***************************
 * RealURL helper script
 ***************************/

/**
 * Prevent new realurl updates from clearing cache
 */
unset($TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_pathcache']);

/**
 * Realurl naming precedence configuration
 */
$TYPO3_CONF_VARS['FE']['addRootLineFields'] .= ',tx_realurl_pathsegment,alias,title';
$TYPO3_CONF_VARS['EXTCONF']['realurl'] = array();
$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
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
			// ab_downloads,
			'dl-act' => array(
				array(
					'GETvar' => 'tx_abdownloads_pi1[action]',
					'valueMap' => array(
						'show-category' => 'getviewcategory',
						'propose-a-new-download' => 'getviewaddnewdownload',
						'open-download' => 'getviewclickeddownload',
						'show-details-for-download' => 'getviewdetailsfordownload',
						'report-broken-download' => 'getviewreportbrokendownload',
						'rate-download' => 'getviewratedownload',
					),
				),
			),
			'dl-cat' => array(
				array(
					'GETvar' => 'tx_abdownloads_pi1[category_uid]',
					'valueMap' => array(
						'home' => '0',
					),
					'lookUpTable' => array(
						'table' => 'tx_abdownloads_category',
						'id_field' => 'uid',
						'alias_field' => 'label',
						'addWhereClause' => ' AND deleted != 1',
						'useUniqueCache' => 1,
						'autoUpdate' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-',
						),
					),
				),
			),
			'dl-file' => array(
				array(
					'GETvar' => 'tx_abdownloads_pi1[uid]',
					'lookUpTable' => array(
						'table' => 'tx_abdownloads_download',
						'id_field' => 'uid',
						'alias_field' => 'label',
						'addWhereClause' => ' AND deleted != 1',
						'useUniqueCache' => 1,
						'autoUpdate' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-',
						),
					),
				),
			),
			'dl-ptr' => array(
				array(
					'GETvar' => 'tx_abdownloads_pi1[pointer]',
				),
			),
			'll-act' => array(
				array(
					'GETvar' => 'tx_ablinklist_pi1[action]',
					'valueMap' => array(
						'show-category' => 'getviewcategory',
						'propose-a-new-link' => 'getviewaddnewlink',
						'open-link' => 'getviewclickedlink',
						'show-details-for-link' => 'getviewdetailsforlink',
						'report-broken-link' => 'getviewreportbrokenlink',
						'rate-link' => 'getviewratelink',
					),
				),
			),
			'll-cat' => array(
				array(
					'GETvar' => 'tx_ablinklist_pi1[category_uid]',
					'valueMap' => array(
						'home' => '0',
					),
					'lookUpTable' => array(
						'table' => 'tx_ablinklist_category',
						'id_field' => 'uid',
						'alias_field' => 'label',
						'addWhereClause' => ' AND deleted != 1',
						'useUniqueCache' => 1,
						'autoUpdate' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-',
						),
					),
				),
			),
			'll-link' => array(
				array(
					'GETvar' => 'tx_ablinklist_pi1[uid]',
					'lookUpTable' => array(
						'table' => 'tx_ablinklist_link',
						'id_field' => 'uid',
						'alias_field' => 'label',
						'addWhereClause' => ' AND deleted != 1',
						'useUniqueCache' => 1,
						'autoUpdate' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-',
						),
					),
				),
			),
			'll-ptr' => array(
				array(
					'GETvar' => 'tx_ablinklist_pi1[pointer]',
				),
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
				# @todo check how controller and action can be hidden from URL. This configuration used to work prior to 6.1.
				#array(
				#	'GETvar' => 'tx_news_pi1[controller]',
				#	'noMatch' => 'null',
				#	'default' => 'News',
				#),
				#array(
				#	'GETvar' => 'tx_news_pi1[action]',
				#	'noMatch' => 'null',
				#	'default' => 'detail',
				#),
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
			'print.html' => array(
				'keyValues' => array(
					'type' => 98,
				)
			),
			'text.html' => array(
				'keyValues' => array(
					'type' => 99,
				)
			),
			'rss.xml' => array(
				'keyValues' => array(
					'type' => 100,
				)
			),
			'rss091.xml' => array(
				'keyValues' => array(
					'type' => 101,
				)
			),
			'rdf.xml' => array(
				'keyValues' => array(
					'type' => 102,
				)
			),
			'atom.xml' => array(
				'keyValues' => array(
					'type' => 103,
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
$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['pagePath']['rootpage_id'] = 1;
#$TYPO3_CONF_VARS['EXTCONF']['realurl']['newsletter.domain.tld'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
#$TYPO3_CONF_VARS['EXTCONF']['realurl']['newsletter.domain.tld']['pagePath']['rootpage_id'] = 4;

/**
 * Edit for multiple languages
 */
if (false) {
	$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DOMAINS'] = array(
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

?>
