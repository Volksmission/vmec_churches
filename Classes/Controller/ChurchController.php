<?php
namespace VMeC\VmecChurches\Controller;


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
 * ChurchController
 */
class ChurchController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * churchRepository
	 *
	 * @var \VMeC\VmecChurches\Domain\Repository\ChurchRepository
	 * @inject
	 */
	protected $churchRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$churches = $this->churchRepository->findAll();
		$this->view->assign('churches', $churches);
	}

	/**
	 * action show
	 *
	 * @param \VMeC\VmecChurches\Domain\Model\Church $church
	 * @return void
	 */
	public function showAction(\VMeC\VmecChurches\Domain\Model\Church $church) {
		$this->view->assign('church', $church);
	}
	
	/**
	 * action closest
	 *
	 * @return void
	 */
	public function closestAction() {
		if ((!$this->request->hasArgument('zip')) && (!$this->request->hasArgument('city'))) {
			$churches = $this->churchRepository->findAll();
			$searchResult = false;
		} else {
			$city = $this->request->hasArgument('city') ? $this->request->getArgument('city') : '';
			$zip = $this->request->hasArgument('zip') ? 'DE-'.$this->request->getArgument('zip') : '';
			$geocoder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('VMeC\VmecChurches\Utility\Geocoder');
			$loc = $geocoder->getLocation(join(' ', array($zip, $city)));
			
			$churches = $this->churchRepository->findClosest($loc['lat'], $loc['lng']);
			$searchResult = true;
		}
		$this->view->assign('searchResult', $searchResult);
		$this->view->assign('churches', $churches);
	}

	/**
	 * action searchForm
	 *
	 * @return void
	 */
	public function searchFormAction() {
	}
	
}