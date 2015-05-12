<?php
namespace Eike\FrabIntegration\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Eike Starkmann <eikestarkmann@web.de>
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
 * ConferenceController
 */
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class ConferenceController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	/**
	* 
 	* @var \Eike\FrabIntegration\Domain\Repository\FrabRepository
 	* @inject
	*/
	protected $frabRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$conferences = $this->frabRepository->findConference(
				$this->settings['conferenceParameters']['conferenceUri'],
				$this->settings['conferenceParameters']['userAgent'],
				$this->settings['conferenceParameters']['accept'],
				$this->settings['conferenceParameters']['encoding']
				);
		DebuggerUtility::var_dump($conferences);
		$this->view->assign('conferences', $conferences);
	}

	/**
	 * action show
	 *
	 * @param \Eike\FrabIntegration\Domain\Model\Conference $conference
	 * @return void
	 */
	public function showAction(\Eike\FrabIntegration\Domain\Model\Conference $conference) {
		$this->view->assign('conference', $conference);
	}
	
	/**
	 * action show
	 *
	 * @param \string $eventGuid
	 * @return void
	 */
	public function showEventAction($eventGuid) {
		$event = $conferences = $this->frabRepository->findEvent(
				$this->settings['conferenceParameters']['conferenceUri'],
				$this->settings['conferenceParameters']['userAgent'],
				$this->settings['conferenceParameters']['accept'],
				$this->settings['conferenceParameters']['encoding'],
				$eventGuid
				);
		$this->view->assign('event', $event);
	}

}