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
 * EventController
 */
class Tx_FrabIntegration_Controller_EventController extends Tx_Extbase_MVC_Controller_ActionController {
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
		$events = $this->frabRepository->findEvents(
				$this->settings['conferenceParameters']['conferenceUri'],
				$this->settings['conferenceParameters']['userAgent'],
				$this->settings['conferenceParameters']['accept'],
				$this->settings['conferenceParameters']['encoding']
				);
		$this->view->assign('events', $events);
	}

	/**
	 * action show
	 *
	 * @param \string $eventGuid
	 * @return void
	 */
	public function showAction($eventGuid) {
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