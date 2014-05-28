<?php
namespace VMeC\VmecChurches\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Christoph Fischer <christoph.fischer@volksmission.de>, Volksmission entschiedener Christen e.V.
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * The repository for Churches
 */
class ChurchRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Find the closest churches by latitude and longitude
	 * 
	 * @param float $lat Latitude
	 * @param float $lng Longitude
	 * @return array
	 */
	public function findClosest(float $lat, float $lng, $maxDistance = 10) {
		$radius = 6368;
		
		$sql = 'SELECT c.uid, '
				.'((ACOS(SIN('.$lat.' * PI() / 180) * SIN(geo_lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(geo_lat * PI() / 180) * COS(('.$lng.' - geo_long) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS distance'
				.' FROM tx_vmecchurches_domain_model_church c LEFT JOIN tx_vmecchurches_domain_model_address a ON c.location=a.uid'
				.'';
		
		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->statement($sql);
		$res = $query->execute();
		
		$churches = array();
		foreach ($res as $row) {
			$church = $this->findByUid($row['uid']);
			$church->setDistance($row['distance']);
			$churches[] = $church;
		}
		return $churches;
	}
}