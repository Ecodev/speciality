<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT'] = [
    'preVars' => [
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
    'postVarSets' => [
        '_DEFAULT' => [
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
            'content' => [
                ['GETvar' => 'tx_vidifrontend_pi1[contentElement]'],
                ['GETvar' => 'tx_vidifrontend_pi1[action]'],
                ['GETvar' => 'tx_vidifrontend_pi1[content]'],
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
