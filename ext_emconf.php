<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Set of page and content templates',
    'description' => 'Based extension providing a set of configuration and templates for your website. Everyone is special...',
    'author' => 'Fabien Udriot',
    'author_email' => 'fabien@ecodev.ch',
    'category' => 'misc',
    'author_company' => 'Ecodev',
    'state' => 'stable',
    'version' => '1.3.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'flux' => '0.0.0-0.0.0',
            'fluidpages' => '0.0.0-0.0.0',
            'fluid_styled_content' => '0.0.0-0.0.0',
            'vhs' => '0.0.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'suggests' => [
    ],
];
