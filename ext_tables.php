<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'frab_integration',
    'List',
    'Frab Conference'
);
$pluginSignature = str_replace('_', '', 'frab_integration') . '_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . 'frab_integration' . '/Configuration/FlexForms/flexform_list.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('frab_integration', 'Configuration/TypoScript', 'Frab Integration');

