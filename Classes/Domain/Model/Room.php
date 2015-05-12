<?php
namespace Eike\FrabIntegration\Domain\Model;


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
 * Room
 */
class Room extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * events
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Event>
	 * @cascade remove
	 */
	protected $events = NULL;

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
		$this->events = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Adds a Event
	 *
	 * @param \Eike\FrabIntegration\Domain\Model\Event $event
	 * @return void
	 */
	public function addEvent(\Eike\FrabIntegration\Domain\Model\Event $event) {
		$this->events->attach($event);
	}

	/**
	 * Removes a Event
	 *
	 * @param \Eike\FrabIntegration\Domain\Model\Event $eventToRemove The Event to be removed
	 * @return void
	 */
	public function removeEvent(\Eike\FrabIntegration\Domain\Model\Event $eventToRemove) {
		$this->events->detach($eventToRemove);
	}

	/**
	 * Returns the events
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Event> $events
	 */
	public function getEvents() {
		return $this->events;
	}

	/**
	 * Sets the events
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Event> $events
	 * @return void
	 */
	public function setEvents(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $events) {
		$this->events = $events;
	}

}