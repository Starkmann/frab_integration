<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_frabintegration_domain_model_day'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_frabintegration_domain_model_day']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, tx_frabintegration_index, date, day_start, day_end, rooms',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, tx_frabintegration_index, date, day_start, day_end, rooms, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_frabintegration_domain_model_day',
				'foreign_table_where' => 'AND tx_frabintegration_domain_model_day.pid=###CURRENT_PID### AND tx_frabintegration_domain_model_day.sys_language_uid IN (-1,0)',
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

		'tx_frabintegration_index' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_day.tx_frabintegration_index',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_day.date',
			'config' => array(
				'dbType' => 'datetime',
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => '0000-00-00 00:00:00'
			),
		),
		'day_start' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_day.day_start',
			'config' => array(
				'dbType' => 'datetime',
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => '0000-00-00 00:00:00'
			),
		),
		'day_end' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_day.day_end',
			'config' => array(
				'dbType' => 'datetime',
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => '0000-00-00 00:00:00'
			),
		),
		'rooms' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_day.rooms',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_frabintegration_domain_model_room',
				'MM' => 'tx_frabintegration_day_room_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_frabintegration_domain_model_room',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
		'conference' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
