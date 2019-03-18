<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'pxa_fal_file_list',
    'Configuration/TypoScript',
    'Fal file listing'
);
