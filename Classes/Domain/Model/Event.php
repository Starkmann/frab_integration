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
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject {

	/**
	 * guid
	 *
	 * @var string
	 */
	protected $guid = '';

	/**
	 * date
	 *
	 * @var \DateTime
	 */
	protected $date = NULL;

	/**
	 * start
	 *
	 * @var \DateTime
	 */
	protected $start = 0;

	/**
	 * duration
	 *
	 * @var \DateTime
	 */
	protected $duration = 0;

	/**
	 * room
	 *
	 * @var string
	 */
	protected $room = '';

	/**
	 * slug
	 *
	 * @var string
	 */
	protected $slug = '';

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * subtitle
	 *
	 * @var string
	 */
	protected $subtitle = '';

	/**
	 * track
	 *
	 * @var string
	 */
	protected $track = '';

	/**
	 * type
	 *
	 * @var string
	 */
	protected $type = '';

	/**
	 * language
	 *
	 * @var string
	 */
	protected $language = '';

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
	 * persons
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Person>
	 */
	protected $persons = NULL;

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
		$this->persons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the guid
	 *
	 * @return string $guid
	 */
	public function getGuid() {
		return $this->guid;
	}

	/**
	 * Sets the guid
	 *
	 * @param string $guid
	 * @return void
	 */
	public function setGuid($guid) {
		$this->guid = $guid;
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
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
	 * Returns the duration
	 *
	 * @return \DateTime $duration
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Sets the duration
	 *
	 * @param \DateTime $duration
	 * @return void
	 */
	public function setDuration(\DateTime $duration) {
		$this->duration = $duration;
	}

	/**
	 * Returns the room
	 *
	 * @return string $room
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * Sets the room
	 *
	 * @param string $room
	 * @return void
	 */
	public function setRoom($room) {
		$this->room = $room;
	}

	/**
	 * Returns the slug
	 *
	 * @return string $slug
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * Sets the slug
	 *
	 * @param string $slug
	 * @return void
	 */
	public function setSlug($slug) {
		$this->slug = $slug;
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
	 * Returns the subtitle
	 *
	 * @return string $subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Sets the subtitle
	 *
	 * @param string $subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Returns the track
	 *
	 * @return string $track
	 */
	public function getTrack() {
		return $this->track;
	}

	/**
	 * Sets the track
	 *
	 * @param string $track
	 * @return void
	 */
	public function setTrack($track) {
		$this->track = $track;
	}

	/**
	 * Returns the type
	 *
	 * @return string $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param string $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the language
	 *
	 * @return string $language
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * Sets the language
	 *
	 * @param string $language
	 * @return void
	 */
	public function setLanguage($language) {
		$this->language = $language;
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
	 * Adds a Person
	 *
	 * @param \Eike\FrabIntegration\Domain\Model\Person $person
	 * @return void
	 */
	public function addPerson(\Eike\FrabIntegration\Domain\Model\Person $person) {
		$this->persons->attach($person);
	}

	/**
	 * Removes a Person
	 *
	 * @param \Eike\FrabIntegration\Domain\Model\Person $personToRemove The Person to be removed
	 * @return void
	 */
	public function removePerson(\Eike\FrabIntegration\Domain\Model\Person $personToRemove) {
		$this->persons->detach($personToRemove);
	}

	/**
	 * Returns the persons
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Person> $persons
	 */
	public function getPersons() {
		return $this->persons;
	}

	/**
	 * Sets the persons
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Person> $persons
	 * @return void
	 */
	public function setPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $persons) {
		$this->persons = $persons;
	}

}