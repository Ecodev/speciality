<?php

if (!defined('TYPO3_MODE')) die ('Access denied.');

# Add user TSConfig
$basePath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('speciality');

// Default User TSConfig to be added in any case.
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
    <INCLUDE_TYPOSCRIPT: source="DIR:EXT:speciality/Configuration/UserTS">
');

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['custom'] = 'EXT:speciality/Configuration/RTE/Custom.yaml';

// Default User TSConfig to be added in any case.
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('

    # Hide the module in the BE.
    RTE.default.preset = custom

');
