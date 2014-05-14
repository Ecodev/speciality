<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fluid Pages: Bootstrap package');

# Add page TSConfig
$pageTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TsConfig/Page/config.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTsConfig);

# Add user TSConfig
$userTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TsConfig/User/config.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig($userTsConfig);

// New icons for the BE
if (TYPO3_MODE == 'BE') {

	$icons = array('category', 'comment', 'storage', 'news', 'people');
	foreach ($icons as $icon) {

		\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
			'pages',
			'contains-' . $icon,
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Backend/Icons/' . $icon . '.png');

		$TCA['pages']['columns']['module']['config']['items'][] = array(
			ucfirst($icon),
			$icon,
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Backend/Icons/' . $icon . '.png'
		);
	}
}

# Use Flux Core API for registering extension provider.
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Page');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Content');