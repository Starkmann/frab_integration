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
		
		$this->view->assign('conferences', $conferences);
	}
	
	/**
	 * action list
	 *@param integer $currentDay
	 * @return void
	 */
	public function sheduleAction($currentDay = 0) {
		$conferences = $this->frabRepository->findConference(
				$this->settings['conferenceParameters']['conferenceUri'],
				$this->settings['conferenceParameters']['userAgent'],
				$this->settings['conferenceParameters']['accept'],
				$this->settings['conferenceParameters']['encoding']
		);
		$day = $this->frabRepository->findDayByIndex(
				$currentDay,
				$this->settings['conferenceParameters']['conferenceUri'],
				$this->settings['conferenceParameters']['userAgent'],
				$this->settings['conferenceParameters']['accept'],
				$this->settings['conferenceParameters']['encoding']
		);
		
		$timeline = $this->generateTimeline($day->getDayStart(), $day->getDayEnd(), 15);
		$this->view->assign('conferences', $conferences);
		$this->view->assign('currentDay', $currentDay);
		$this->view->assign('timeline', $timeline);
		
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
	 * 
	 * @param \DateTime $begin
	 * @param \DateTime $end
	 * @param integer $step
	 */
	protected function generateTimeline($begin, $end, $step){
		$timeSolts = array();
		$timeSolts[] = $begin;
		$currentTime = clone $begin;

		while($currentTime<$end){
			$currentTime->add(new \DateInterval('PT' . $step . 'M'));
			$timeSolts[] = clone $currentTime;
		}
		return $timeSolts;
	}

}