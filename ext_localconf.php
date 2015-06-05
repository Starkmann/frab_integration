<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'List',
	array(
		'Conference' => 'list',
		'Person' => 'list, show',
		'Event' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Conference' => '',
		'Person' => '',
		'Event' => '',
	)
);
