<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    'frab_integration',
    'List',
    'Frab Conference'
);
$pluginSignature = str_replace('_', '', 'frab_integration') . '_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . 'frab_integration' . '/Configuration/FlexForms/flexform_list.xml');

ExtensionManagementUtility::addStaticFile('frab_integration', 'Configuration/TypoScript', 'Frab Integration');

