<?php
namespace VMeC\VmecChurches\Domain\Model;


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
 * Address
 */
class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * street
	 *
	 * @var string
	 */
	protected $street = '';

	/**
	 * zip
	 *
	 * @var string
	 */
	protected $zip = '';

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * geoLat
	 *
	 * @var float
	 */
	protected $geoLat = 0.0;

	/**
	 * geoLong
	 *
	 * @var float
	 */
	protected $geoLong = 0.0;

	/**
	 * Returns the street
	 *
	 * @return string $street
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * Sets the street
	 *
	 * @param string $street
	 * @return void
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the geoLat
	 *
	 * @return float $geoLat
	 */
	public function getGeoLat() {
		return $this->geoLat;
	}

	/**
	 * Sets the geoLat
	 *
	 * @param float $geoLat
	 * @return void
	 */
	public function setGeoLat($geoLat) {
		$this->geoLat = $geoLat;
	}

	/**
	 * Returns the geoLong
	 *
	 * @return float $geoLong
	 */
	public function getGeoLong() {
		return $this->geoLong;
	}

	/**
	 * Sets the geoLong
	 *
	 * @param float $geoLong
	 * @return void
	 */
	public function setGeoLong($geoLong) {
		$this->geoLong = $geoLong;
	}

}