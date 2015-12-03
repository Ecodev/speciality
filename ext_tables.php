<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('speciality', 'Configuration/TypoScript', 'Speciality: main template');

# Add user TSConfig
$basePath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('speciality');

// User TS configuration for the "admin panel".
$adminPanelTs = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($basePath . 'Configuration/UserTS/admPanel.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig($adminPanelTs);

// User TS configuration for "modules".
$moduleTs = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($basePath . 'Configuration/UserTS/mod.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig($moduleTs);

// User TS configuration for "options".
$optionsTs = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($basePath . 'Configuration/UserTS/options.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig($optionsTs);

// User TS configuration for "setup".
$setupTs = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($basePath . 'Configuration/UserTS/setup.ts');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig($setupTs);

// New icons for the BE
if (TYPO3_MODE == 'BE') {

    $icons = array('category', 'comment', 'storage', 'news', 'people');
    foreach ($icons as $icon) {

        \TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
            'pages',
            'contains-' . $icon,
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('speciality') . 'Resources/Public/Backend/Icons/' . $icon . '.png');

        $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = array(
            ucfirst($icon),
            $icon,
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('speciality') . 'Resources/Public/Backend/Icons/' . $icon . '.png'
        );
    }
}

# Use Flux Core API for registering extension provider.
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('speciality', 'Page');
# Nothing to register yet. TODO: restore me!
#\FluidTYPO3\Flux\Core::registerProviderExtensionKey('speciality', 'Content');