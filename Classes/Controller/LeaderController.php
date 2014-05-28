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
 * LeaderController
 */
class LeaderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * leaderRepository
	 *
	 * @var \VMeC\VmecChurches\Domain\Repository\LeaderRepository
	 * @inject
	 */
	protected $leaderRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$leaders = $this->leaderRepository->findAll();
		$this->view->assign('leaders', $leaders);
	}

	/**
	 * action show
	 *
	 * @param \VMeC\VmecChurches\Domain\Model\Leader $leader
	 * @return void
	 */
	public function showAction(\VMeC\VmecChurches\Domain\Model\Leader $leader) {
		$this->view->assign('leader', $leader);
	}

}