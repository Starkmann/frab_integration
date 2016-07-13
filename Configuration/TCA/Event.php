<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['\Eike\FrabIntegration\Domain\Model\Event'] = array(
	'ctrl' => $GLOBALS['TCA']['\Eike\FrabIntegration\Domain\Model\Event']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, guid, date, start, duration, room, slug, title, subtitle, track, type, language, abstract, description, links, persons',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, guid, date, start, duration, room, slug, title, subtitle, track, type, language, abstract, description, links, persons, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => '\Eike\FrabIntegration\Domain\Model\Event',
				'foreign_table_where' => 'AND \Eike\FrabIntegration\Domain\Model\Event.pid=###CURRENT_PID### AND \Eike\FrabIntegration\Domain\Model\Event.sys_language_uid IN (-1,0)',
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

		'guid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.guid',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.date',
			'config' => array(
				'dbType' => 'datetime',
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => '0000-00-00 00:00:00'
			),
		),
		'start' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.start',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'time',
				'checkbox' => 1,
				'default' => time()
			)
		),
		'duration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.duration',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'time',
				'checkbox' => 1,
				'default' => time()
			)
		),
		'room' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.room',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'slug' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.slug',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'subtitle' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.subtitle',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'track' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.track',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.type',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'language' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.language',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'abstract' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.abstract',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'links' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.links',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'persons' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:\Eike\FrabIntegration\Domain\Model\Event.persons',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_frabintegration_domain_model_person',
				'MM' => 'tx_frabintegration_event_person_mm',
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
							'table' => 'tx_frabintegration_domain_model_person',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
		'room' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
