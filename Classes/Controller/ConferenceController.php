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
	 * Initialize view
	 *
	 * @return void
	 */
	public function initializeAction() {
		if($this->settings['cssPath'])
			$this->response->addAdditionalHeaderData($this->wrapCssFile($this->settings['cssPath']));
		else
		$this->response->addAdditionalHeaderData($this->wrapCssFile(t3lib_extMgm::siteRelPath('frab_integration') . 'Resources/Public/Css/Style.css'));
		#$this->response->addAdditionalHeaderData($this->wrapJsFile(t3lib_extMgm::extRelPath('frab_integration') . 'Resources/Public/Js/jquery.js'));
		#$this->response->addAdditionalHeaderData($this->wrapJsFile(t3lib_extMgm::extRelPath('frab_integration') . 'Resources/Public/Js/jquery.dataTables.js'));
		#$this->response->addAdditionalHeaderData($this->wrapJsFile(t3lib_extMgm::extRelPath('frab_integration') . 'Resources/Public/Js/dataTables.fixedColumns.js'));
		#$this->response->addAdditionalHeaderData($this->wrapJsFile(t3lib_extMgm::extRelPath('frab_integration') . 'Resources/Public/Js/Scroll.js'));
		
	}
	
	public function intitializeSheduleAction() {
		
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
	 * @param Tx_FrabIntegration_Domain_Model_Conference $conference
	 * @return void
	 */
	public function showAction(Tx_FrabIntegration_Domain_Model_Conference $conference) {
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
	
	/**
	 * Wrap css files inside <link /> tag
	 *
	 * @param string $cssFile Path to file
	 * @return string <link.. string ready for <head> part
	 */
	public function wrapCssFile($cssFile) {
		$cssFile = t3lib_div::resolveBackPath($cssFile);
		$cssFile = t3lib_div::createVersionNumberedFilename($cssFile);
		return '<link rel="stylesheet" type="text/css" href="' . htmlspecialchars($cssFile) . '" media="screen" />';
	}
	
	/**
	 * Wrap css files inside <link /> tag
	 *
	 * @param string $cssFile Path to filegetPo
	 * @return string <link.. string ready for <head> part
	 */
	public function wrapJsFile($jsFile) {
		$jsFile = t3lib_div::resolveBackPath($jsFile);
		$jsFile = t3lib_div::createVersionNumberedFilename($jsFile);
		return '<script type="text/javascript" src="' . htmlspecialchars($jsFile) . '" ></script>';
	}

}
