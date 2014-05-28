<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_vmecchurches_domain_model_church'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_vmecchurches_domain_model_church']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, city, name, url, image, location, office, leaders',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, city, name, url, image, location, office, leaders, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_vmecchurches_domain_model_church',
				'foreign_table_where' => 'AND tx_vmecchurches_domain_model_church.pid=###CURRENT_PID### AND tx_vmecchurches_domain_model_church.sys_language_uid IN (-1,0)',
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

		'city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:vmec_churches/Resources/Private/Language/locallang_db.xlf:tx_vmecchurches_domain_model_church.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:vmec_churches/Resources/Private/Language/locallang_db.xlf:tx_vmecchurches_domain_model_church.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'url' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:vmec_churches/Resources/Private/Language/locallang_db.xlf:tx_vmecchurches_domain_model_church.url',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
	            'wizards' => array(
	                '_PADDING' => 2,
	                'link' => array(
	                    'type' => 'popup',
	                    'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
	                    'icon' => 'link_popup.gif',
	                    'script' => 'browse_links.php?mode=wizard',
	                    'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
	                ),
	            ),
	            'softref' => 'typolink',
            ),
		),
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:vmec_churches/Resources/Private/Language/locallang_db.xlf:tx_vmecchurches_domain_model_church.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:vmec_churches/Resources/Private/Language/locallang_db.xlf:tx_vmecchurches_domain_model_church.location',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_vmecchurches_domain_model_address',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'office' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:vmec_churches/Resources/Private/Language/locallang_db.xlf:tx_vmecchurches_domain_model_church.office',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_vmecchurches_domain_model_address',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'leaders' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:vmec_churches/Resources/Private/Language/locallang_db.xlf:tx_vmecchurches_domain_model_church.leaders',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vmecchurches_domain_model_leader',
				'MM' => 'tx_vmecchurches_church_leader_mm',
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
							'table' => 'tx_vmecchurches_domain_model_leader',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
	),
);
