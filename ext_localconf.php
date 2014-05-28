<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'VMeC.' . $_EXTKEY,
	'Churches',
	array(
		'Church' => 'list, show, closest',
		'Leader' => 'list, show',
		'Address' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Church' => '',
		'Leader' => '',
		'Address' => '',
		
	)
);
