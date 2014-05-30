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
 * Church
 */
class Church extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * url
	 *
	 * @var string
	 */
	protected $url = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * location
	 *
	 * @var \VMeC\VmecChurches\Domain\Model\Address
	 */
	protected $location = NULL;

	/**
	 * office
	 *
	 * @var \VMeC\VmecChurches\Domain\Model\Address
	 */
	protected $office = NULL;

	/**
	 * leaders
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VMeC\VmecChurches\Domain\Model\Leader>
	 */
	protected $leaders = NULL;
	
	/**
	 * Distance to search start (only for searches)
	 * 
	 * @var float
	 */
	protected $distance;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->leaders = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the url
	 *
	 * @return string $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the location
	 *
	 * @return \VMeC\VmecChurches\Domain\Model\Address $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param \VMeC\VmecChurches\Domain\Model\Address $location
	 * @return void
	 */
	public function setLocation(\VMeC\VmecChurches\Domain\Model\Address $location) {
		$this->location = $location;
	}

	/**
	 * Returns the office
	 *
	 * @return \VMeC\VmecChurches\Domain\Model\Address $office
	 */
	public function getOffice() {
		return $this->office;
	}

	/**
	 * Sets the office
	 *
	 * @param \VMeC\VmecChurches\Domain\Model\Address $office
	 * @return void
	 */
	public function setOffice(\VMeC\VmecChurches\Domain\Model\Address $office) {
		$this->office = $office;
	}

	/**
	 * Adds a Leader
	 *
	 * @param \VMeC\VmecChurches\Domain\Model\Leader $leader
	 * @return void
	 */
	public function addLeader(\VMeC\VmecChurches\Domain\Model\Leader $leader) {
		$this->leaders->attach($leader);
	}

	/**
	 * Removes a Leader
	 *
	 * @param \VMeC\VmecChurches\Domain\Model\Leader $leaderToRemove The Leader to be removed
	 * @return void
	 */
	public function removeLeader(\VMeC\VmecChurches\Domain\Model\Leader $leaderToRemove) {
		$this->leaders->detach($leaderToRemove);
	}

	/**
	 * Returns the leaders
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VMeC\VmecChurches\Domain\Model\Leader> $leaders
	 */
	public function getLeaders() {
		return $this->leaders;
	}

	/**
	 * Sets the leaders
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VMeC\VmecChurches\Domain\Model\Leader> $leaders
	 * @return void
	 */
	public function setLeaders(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $leaders) {
		$this->leaders = $leaders;
	}
	
	public function setDistance($km) {
		$this->distance = $km;
	}
	
	public function getDistance() {
		return $this->distance;
	}

}