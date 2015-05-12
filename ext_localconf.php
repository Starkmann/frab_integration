<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Eike.' . $_EXTKEY,
	'List',
	array(
		'Conference' => 'list, show, showEvent',
		'Person' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Conference' => '',
		'Person' => '',
		
	)
);
