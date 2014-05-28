<?php

namespace VMeC\VmecChurches\Hooks;

/**
 * Hook into tcemain
 *
 * @package VMeC
 * @subpackage vmec_churches
 */
class ProcessDatamap {

	/**
	 * Hook for synchronizing geoinfo after any database operation
	 *
 	 * @param string $status new oder update
	 * @param string $table Name der Tabelle
	 * @param int $id UID des Datensatzes
	 * @param array $fieldArray Felder des Datensatzes, die sich ändern
	 * @param tce_main $tcemain
	 * @return void
	 */

	function processDatamap_preProcessFieldArray(array &$fieldArray, $table, $id, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
		if($table == 'tx_vmecchurches_domain_model_address') {
			$geocoder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('VMeC\VmecChurches\Utility\Geocoder');
			$loc = $geocoder->getLocation($fieldArray['street'].', '.$fieldArray['zip'].' '.$fieldArray['city']);
			$fieldArray['geo_lat'] = $loc['lat'];
			$fieldArray['geo_long'] = $loc['lng'];	
		}
	}	

}