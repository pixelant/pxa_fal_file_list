<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Pixelant.pxa_fal_file_list',
        'Pi1',
        [
            'FilesList' => 'list',
        ],
        [
        ]
    );
});
