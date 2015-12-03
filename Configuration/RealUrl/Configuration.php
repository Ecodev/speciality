<?php
/***************************
 * RealURL helper script
 ***************************/

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = [];
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT'] = [
    'init' => [
        'enableCHashCache' => true,
        'appendMissingSlash' => 'ifNotFile',
        'adminJumpToBackend' => true,
        'enableUrlDecodeCache' => true,
        'enableUrlEncodeCache' => true,
        'emptyUrlReturnValue' => '/',
        // Allow for proper SEO 404 handling,
        'postVarSet_failureMode' => '',
        'reapplyAbsRefPrefix' => true,
    ],
    #'redirects' => array(),
    'redirects_regex' => [],
    'preVars' => [
        [
            'GETvar' => 'no_cache',
            'valueMap' => [
                'no_cache' => 1,
            ],
            'noMatch' => 'bypass',
        ],
        [
            'GETvar' => 'clear_cache'
            , 'valueMap' => [
            'cc' => 1
        ],
            'noMatch' => 'bypass'
        ],

        // Language configuration
        [
            'GETvar' => 'L',
            'valueMap' => [
                // id's need to line up with Website Language Ids in TYPO3
                '' => '0',
                'fr' => '1',
                'de' => '2',
            ],
            'noMatch' => 'bypass',
        ],
    ],
    'pagePath' => [
        'type' => 'user',
        'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
        'spaceCharacter' => '-',
        'languageGetVar' => 'L',
        'rootpage_id' => 1,
        'segTitleFieldList' => 'tx_realurl_pathsegment,alias,title',
        'expireDays' => 7
    ],
    'fixedPostVars' => [],
    'postVarSets' => [
        '_DEFAULT' => [
            'login' => [
                ['GETvar' => 'tx_newloginbox_pi3[showUid]']
            ],
            'forgot-login' => [
                ['GETvar' => 'tx_newloginbox_pi1[forgot]']
            ],
            'forgot' => [
                ['GETvar' => 'tx_felogin_pi1[forgot]']
            ],
            'query' => [
                ['GETvar' => 'tx_indexedsearch[sword]'],
                ['GETvar' => 'tx_indexedsearch[ext]'],
                ['GETvar' => 'tx_indexedsearch[submit_button]'],
                ['GETvar' => 'tx_indexedsearch[_sections]'],
                ['GETvar' => 'tx_indexedsearch[pointer]'],
                ['GETvar' => 'tx_indexedsearch[extResume]'],
                ['GETvar' => 'tx_indexedsearch[type]'],
                ['GETvar' => 'tx_indexedsearch[group]'],
                ['GETvar' => 'tx_indexedsearch[_freeIndexUid]'],
                ['GETvar' => 'tx_indexedsearch[media]'],
                ['GETvar' => 'tx_indexedsearch[defOp]'],
                ['GETvar' => 'tx_indexedsearch[ang]'],
                ['GETvar' => 'tx_indexedsearch[desc]'],
                ['GETvar' => 'tx_indexedsearch[results]'],
                ['GETvar' => 'tx_indexedsearch[sections]'],
                ['GETvar' => 'tx_indexedsearch[lang]'],
                ['GETvar' => 'tx_indexedsearch[order]'],
                ['GETvar' => 'tx_indexedsearch[freeIndexUid]']
            ],
            'article' => [
                [
                    'GETvar' => 'tx_news_pi1[news]',
                    'lookUpTable' => [
                        'table' => 'tx_news_domain_model_news',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause' => ' AND NOT deleted AND NOT hidden',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => [
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        ],
                    ],
                ],
            ],
        ]
    ],
    'fileName' => [
        'index' => [
            'index.html' => [
                'keyValues' => [
                    'type' => 0,
                ]
            ],
            // ext:seo_basics overrides this,
            'sitemap.xml' => [
                'keyValues' => [
                    'type' => 776,
                ]
            ],
            '_DEFAULT' => [
                'keyValues' => []
            ]
        ],
        'defaultToHTMLsuffixOnPrev' => 0,
        'acceptHTMLsuffix' => 1
    ],
];

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