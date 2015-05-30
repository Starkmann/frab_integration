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
 * Person
 */
class Tx_FrabIntegration_Domain_Model_Person extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * ID
	 * @var integer
	 */
	protected $id = NULL;
	
	/**
	 * image
	 *
	 * @var string
	 */
	protected $image = '';

	/**
	 * fullPublicName
	 *
	 * @var string
	 */
	protected $fullPublicName = '';

	/**
	 * abstract
	 *
	 * @var string
	 */
	protected $abstract = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * links
	 *
	 * @var string
	 */
	protected $links = '';

	/**
	 * events
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_FrabIntegration_Domain_Model_Event>
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
		$this->events = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the id
	 *
	 * @return string $id
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Sets the id
	 *
	 * @param string $id
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * Returns the image
	 *
	 * @return string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the fullPublicName
	 *
	 * @return string $fullPublicName
	 */
	public function getFullPublicName() {
		return $this->fullPublicName;
	}

	/**
	 * Sets the fullPublicName
	 *
	 * @param string $fullPublicName
	 * @return void
	 */
	public function setFullPublicName($fullPublicName) {
		$this->fullPublicName = $fullPublicName;
	}

	/**
	 * Returns the abstract
	 *
	 * @return string $abstract
	 */
	public function getAbstract() {
		return $this->abstract;
	}

	/**
	 * Sets the abstract
	 *
	 * @param string $abstract
	 * @return void
	 */
	public function setAbstract($abstract) {
		$this->abstract = $abstract;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the links
	 *
	 * @return string $links
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Sets the links
	 *
	 * @param string $links
	 * @return void
	 */
	public function setLinks($links) {
		$this->links = $links;
	}

	/**
	 * Adds a Event
	 *
	 * @param Tx_FrabIntegration_Domain_Model_Event $event
	 * @return void
	 */
	public function addEvent(Tx_FrabIntegration_Domain_Model_Event $event) {
		$this->events->attach($event);
	}

	/**
	 * Removes a Event
	 *
	 * @param Tx_FrabIntegration_Domain_Model_Event $eventToRemove The Event to be removed
	 * @return void
	 */
	public function removeEvent(Tx_FrabIntegration_Domain_Model_Event $eventToRemove) {
		$this->events->detach($eventToRemove);
	}

	/**
	 * Returns the events
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_FrabIntegration_Domain_Model_Event> $events
	 */
	public function getEvents() {
		return $this->events;
	}

	/**
	 * Sets the events
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_FrabIntegration_Domain_Model_Event> $events
	 * @return void
	 */
	public function setEvents(Tx_Extbase_Persistence_ObjectStorage $events) {
		$this->events = $events;
	}

}