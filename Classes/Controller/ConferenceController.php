<?php
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


class Tx_FrabIntegration_Controller_ConferenceController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	* 
 	* @var Tx_FrabIntegration_Domain_Repository_FrabRepository
 	* @inject
	*/
	protected $frabRepository;

	public function injectFrabRepository(Tx_FrabIntegration_Domain_Repository_FrabRepository $frabRepository){
		$this->frabRepository = $frabRepository;
	} 
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
		$this->view->assign('conferences', $conferences);
	}

	/**
	 * action show
	 *
	 * @param Tx_FrabIntegration_Domain_Model_Conference $conference
	 * @return void
	 */
	public function showAction(Tx_FrabIntegration_Domain_Model_Conference $conference) {
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