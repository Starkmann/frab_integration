<?php
namespace Eike\FrabIntegration\Domain\Model;
use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;
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
 * Day
 */
class Day extends AbstractValueObject {

	/**
	 * index
	 *
	 * @var integer
	 */
	protected $index = 0;

	/**
	 * date
	 *
	 * @var \DateTime
	 */
	protected $date = NULL;

	/**
	 * dayStart
	 *
	 * @var \DateTime
	 */
	protected $dayStart = NULL;

	/**
	 * dayEnd
	 *
	 * @var \DateTime
	 */
	protected $dayEnd = NULL;

	/**
	 * rooms
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Room>
	 */
	protected $rooms = NULL;

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
		$this->rooms = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the index
	 *
	 * @return integer $index
	 */
	public function getIndex() {
		return $this->index;
	}

	/**
	 * Sets the index
	 *
	 * @param integer $index
	 * @return void
	 */
	public function setIndex($index) {
		$this->index = $index;
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		setlocale(LC_TIME, "de_DE");
		return strftime('%A, %d.%m.%Y',$this->date->getTimestamp());
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;
	}

	/**
	 * Returns the dayStart
	 *
	 * @return \DateTime $dayStart
	 */
	public function getDayStart() {
		return $this->dayStart;
	}

	/**
	 * Sets the dayStart
	 *
	 * @param \DateTime $dayStart
	 * @return void
	 */
	public function setDayStart(\DateTime $dayStart) {
		$this->dayStart = $dayStart;
	}

	/**
	 * Returns the dayEnd
	 *
	 * @return \DateTime $dayEnd
	 */
	public function getDayEnd() {
		return $this->dayEnd;
	}

	/**
	 * Sets the dayEnd
	 *
	 * @param \DateTime $dayEnd
	 * @return void
	 */
	public function setDayEnd(\DateTime $dayEnd) {
		$this->dayEnd = $dayEnd;
	}

	/**
	 * Adds a Room
	 *
	 * @param \Eike\FrabIntegration\Domain\Model\Room $room
	 * @return void
	 */
	public function addRoom(\Eike\FrabIntegration\Domain\Model\Room $room) {
		$this->rooms->attach($room);
	}

	/**
	 * Removes a Room
	 *
	 * @param \Eike\FrabIntegration\Domain\Model\Room $roomToRemove The Room to be removed
	 * @return void
	 */
	public function removeRoom(\Eike\FrabIntegration\Domain\Model\Room $roomToRemove) {
		$this->rooms->detach($roomToRemove);
	}

	/**
	 * Returns the rooms
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Room> $rooms
	 */
	public function getRooms() {
		return $this->rooms;
	}

	/**
	 * Sets the rooms
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Room> $rooms
	 * @return void
	 */
	public function setRooms(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $rooms) {
		$this->rooms = $rooms;
	}

}