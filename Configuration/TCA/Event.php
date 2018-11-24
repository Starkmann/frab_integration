<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$tca = array(
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
        'iconfile' => 'EXT:frab_integration/Resources/Public/Icons/tx_frabintegration_domain_model_event.gif'
    ),
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
				'foreign_table' => 'tx_frabintegration_domain_model_event',
				'foreign_table_where' => 'AND tx_frabintegration_domain_model_event.pid=###CURRENT_PID### AND tx_frabintegration_domain_model_event.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.guid',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.date',
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
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.start',
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
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.duration',
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
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.room',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'slug' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.slug',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'subtitle' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.subtitle',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'track' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.track',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.type',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'language' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.language',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'abstract' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.abstract',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'links' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.links',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'persons' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frab_integration/Resources/Private/Language/locallang_db.xlf:tx_frabintegration_domain_model_event.persons',
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
return $tca;
