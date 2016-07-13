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
 * Conference
 */
class Tx_FrabIntegration_Domain_Model_Conference extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * start
	 *
	 * @var \DateTime
	 */
	protected $start = NULL;

	/**
	 * end
	 *
	 * @var \DateTime
	 */
	protected $end = NULL;

	/**
	 * daysCount
	 *
	 * @var integer
	 */
	protected $daysCount = 0;

	/**
	 * timeslotDuration
	 *
	 * @var \DateTime
	 */
	protected $timeslotDuration = 0;

	/**
	 * days
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_FrabIntegration_Domain_Model_Day>
	 * @cascade remove
	 */
	protected $days = NULL;

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
		$this->days = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the start
	 *
	 * @return \DateTime $start
	 */
	public function getStart() {
		return $this->start;
	}

	/**
	 * Sets the start
	 *
	 * @param \DateTime $start
	 * @return void
	 */
	public function setStart(\DateTime $start) {
		$this->start = $start;
	}

	/**
	 * Returns the end
	 *
	 * @return \DateTime $end
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * Sets the end
	 *
	 * @param \DateTime $end
	 * @return void
	 */
	public function setEnd(\DateTime $end) {
		$this->end = $end;
	}

	/**
	 * Returns the daysCount
	 *
	 * @return integer $daysCount
	 */
	public function getDaysCount() {
		return $this->daysCount;
	}

	/**
	 * Sets the daysCount
	 *
	 * @param integer $daysCount
	 * @return void
	 */
	public function setDaysCount($daysCount) {
		$this->daysCount = $daysCount;
	}

	/**
	 * Returns the timeslotDuration
	 *
	 * @return \DateTime $timeslotDuration
	 */
	public function getTimeslotDuration() {
		return $this->timeslotDuration;
	}

	/**
	 * Sets the timeslotDuration
	 *
	 * @param \DateTime $timeslotDuration
	 * @return void
	 */
	public function setTimeslotDuration(\DateTime $timeslotDuration) {
		$this->timeslotDuration = $timeslotDuration;
	}

	/**
	 * Adds a Day
	 *
	 * @param Tx_FrabIntegration_Domain_Model_Day $day
	 * @return void
	 */
	public function addDay(Tx_FrabIntegration_Domain_Model_Day $day) {
		$this->days->attach($day);
	}

	/**
	 * Removes a Day
	 *
	 * @param Tx_FrabIntegration_Domain_Model_Day $dayToRemove The Day to be removed
	 * @return void
	 */
	public function removeDay(Tx_FrabIntegration_Domain_Model_Day $dayToRemove) {
		$this->days->detach($dayToRemove);
	}

	/**
	 * Returns the days
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_FrabIntegration_Domain_Model_Day> $days
	 */
	public function getDays() {
		return $this->days;
	}

	/**
	 * Sets the days
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_FrabIntegration_Domain_Model_Day> $days
	 * @return void
	 */
	public function setDays(Tx_Extbase_Persistence_ObjectStorage $days) {
		$this->days = $days;
	}

}