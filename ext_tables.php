<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Eike.'.$_EXTKEY,
	'List',
	'Frab Conference'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Frab Integration');

t3lib_extMgm::addLLrefForTCAdescr('tx_frabintegration_domain_model_conference', 'EXT:frab_integration/Resources/Private/Language/locallang_csh_tx_frabintegration_domain_model_conference.xlf');
t3lib_extMgm::allowTableOnStandardPages('tx_frabintegration_domain_model_conference');
$GLOBALS['TCA']['tx_frabintegration_domain_model_conference'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_conference',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,start,end,days_count,timeslot_duration,days,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Conference.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_frabintegration_domain_model_conference.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_frabintegration_domain_model_room', 'EXT:frab_integration/Resources/Private/Language/locallang_csh_tx_frabintegration_domain_model_room.xlf');
t3lib_extMgm::allowTableOnStandardPages('tx_frabintegration_domain_model_room');
$GLOBALS['TCA']['tx_frabintegration_domain_model_room'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_room',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,events,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Room.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_frabintegration_domain_model_room.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_frabintegration_domain_model_person', 'EXT:frab_integration/Resources/Private/Language/locallang_csh_tx_frabintegration_domain_model_person.xlf');
t3lib_extMgm::allowTableOnStandardPages('tx_frabintegration_domain_model_person');
$GLOBALS['TCA']['tx_frabintegration_domain_model_person'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_person',
		'label' => 'image',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'image,full_public_name,abstract,description,links,events,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Person.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_frabintegration_domain_model_person.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_frabintegration_domain_model_day', 'EXT:frab_integration/Resources/Private/Language/locallang_csh_tx_frabintegration_domain_model_day.xlf');
t3lib_extMgm::allowTableOnStandardPages('tx_frabintegration_domain_model_day');
$GLOBALS['TCA']['tx_frabintegration_domain_model_day'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_day',
		'label' => 'tx_frabintegration_index',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'tx_frabintegration_index,date,day_start,day_end,rooms,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Day.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_frabintegration_domain_model_day.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_frabintegration_domain_model_event', 'EXT:frab_integration/Resources/Private/Language/locallang_csh_tx_frabintegration_domain_model_event.xlf');
t3lib_extMgm::allowTableOnStandardPages('tx_frabintegration_domain_model_event');
$GLOBALS['TCA']['tx_frabintegration_domain_model_event'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event',
		'label' => 'guid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'guid,date,start,duration,room,slug,title,subtitle,track,type,language,abstract,description,links,persons,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Event.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_frabintegration_domain_model_event.gif'
	),
);
