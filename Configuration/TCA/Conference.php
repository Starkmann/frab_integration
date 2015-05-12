<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_frabintegration_domain_model_conference'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_frabintegration_domain_model_conference']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, start, end, days_count, timeslot_duration, days',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, start, end, days_count, timeslot_duration, days, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_frabintegration_domain_model_conference',
				'foreign_table_where' => 'AND tx_frabintegration_domain_model_conference.pid=###CURRENT_PID### AND tx_frabintegration_domain_model_conference.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_conference.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'start' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_conference.start',
			'config' => array(
				'dbType' => 'datetime',
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => '0000-00-00 00:00:00'
			),
		),
		'end' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_conference.end',
			'config' => array(
				'dbType' => 'datetime',
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => '0000-00-00 00:00:00'
			),
		),
		'days_count' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_conference.days_count',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'timeslot_duration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_conference.timeslot_duration',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'time',
				'checkbox' => 1,
				'default' => time()
			)
		),
		'days' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_conference.days',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_frabintegration_domain_model_day',
				'foreign_field' => 'conference',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		
	),
);
