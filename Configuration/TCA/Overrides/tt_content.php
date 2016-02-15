<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


$GLOBALS['TCA']['tt_content']['types']['image']['showitem'] = '
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
        --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.images,
                image,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.imagelinks;imagelinks,
	    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
	    		--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.image_settings;image_settings,
		        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
        --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended
';


$GLOBALS['TCA']['tt_content']['palettes']['image_settings']['showitem'] = 'imagewidth;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:imagewidth_formlabel, imageheight;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:imageheight_formlabel, imageborder;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:imageborder_formlabel, --linebreak--, image_compression;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:image_compression_formlabel, image_effects';