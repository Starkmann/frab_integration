<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Eike.frab_integration',
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

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);
$registry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$registry->registerIcon('extension-frab-integration', \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class, [
    'source' => 'EXT:autoloader/Resources/Public/Icons/Extension.svg',
]);

