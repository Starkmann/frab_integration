<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Eike.' . $_EXTKEY,
    'List',
    [
        'Conference' => 'list, show, showEvent, shedule',
        'Person' => 'list, show',
        'Event' => 'list, show',

    ],
    // non-cacheable actions
    [
        'Conference' => '',
        'Person' => '',
        'Event' => '',
    ]
);
