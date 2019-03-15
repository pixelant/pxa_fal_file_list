<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'pxa_fal_file_list',
    'Pi1',
    'LLL:EXT:pxa_fal_file_list/Resources/Private/Language/locallang_be.xlf:pi1_plugin'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['pxafalfilelist_pi1'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['pxafalfilelist_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'pxafalfilelist_pi1',
    'FILE:EXT:pxa_fal_file_list/Configuration/FlexForms/flexform_pi1.xml'
);
