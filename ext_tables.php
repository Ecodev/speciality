<?php

if (!defined('TYPO3_MODE')) die ('Access denied.');

# Add user TSConfig
$basePath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('speciality');

// Default User TSConfig to be added in any case.
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
    <INCLUDE_TYPOSCRIPT: source="DIR:EXT:speciality/Configuration/UserTS">
');

// New icons for the BE
if (TYPO3_MODE === 'BE') {

    $icons = array('category', 'comment', 'storage', 'news', 'people');
    foreach ($icons as $icon) {

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)->registerIcon(
            'tcarecords-pages-contains-' . $icon,
            \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
            ['source' => 'EXT:speciality/Resources/Public/Backend/Icons/' . $icon . '.png']
        );

        $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = array(
            ucfirst($icon),
            $icon,
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('speciality') . 'Resources/Public/Backend/Icons/' . $icon . '.png'
        );
    }
}
