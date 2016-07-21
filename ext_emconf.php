<?php
$EM_CONF[$_EXTKEY] = [
	'title' => 'Set of page and content templates',
	'description' => 'Based extension providing a set of configuration and templates for your website. Everyone is special...',
	'author' => 'Fabien Udriot',
	'author_email' => 'fabien@ecodev.ch',
	'category' => 'misc',
	'author_company' => 'Ecodev',
	'state' => 'stable',
	'version' => '1.2.0-dev',
	'constraints' => [
		'depends' => [
			'typo3' => '7.6.0-7.99.99',
			'flux' => '',
			'fluidpages' => '',
			'fluidcontent' => '',
			'fluidcontent_core' => '',
			'vhs' => '',
		],
		'conflicts' => [
		],
		'suggests' => [
		],
	],
	'suggests' => [
	],
];