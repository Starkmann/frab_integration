<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use Eike\FrabIntegration\Controller\ConferenceController;
use Eike\FrabIntegration\Controller\PersonController;
use Eike\FrabIntegration\Controller\EventController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::configurePlugin(
    'FrabIntegration',
    'List',
    [
        ConferenceController::class => 'list, show, showEvent, shedule',
        PersonController::class => 'list, show',
        EventController::class => 'list, show',

    ],
    // non-cacheable actions
    [
        ConferenceController::class => '',
        PersonController::class => '',
        EventController::class => '',
    ]
);

$iconRegistry = GeneralUtility::makeInstance(
    IconRegistry::class
);
$registry = GeneralUtility::makeInstance(IconRegistry::class);
$registry->registerIcon('extension-frab-integration', BitmapIconProvider::class, [
    'source' => 'EXT:autoloader/Resources/Public/Icons/Extension.svg',
]);

