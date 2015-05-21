<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
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
