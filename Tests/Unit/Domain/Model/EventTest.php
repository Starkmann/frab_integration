<?php

namespace Eike\FrabIntegration\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Eike Starkmann <eikestarkmann@web.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_FrabIntegration_Domain_Model_Event.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Eike Starkmann <eikestarkmann@web.de>
 */
class EventTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var Tx_FrabIntegration_Domain_Model_Event
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new Tx_FrabIntegration_Domain_Model_Event();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getGuidReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getGuid()
		);
	}

	/**
	 * @test
	 */
	public function setGuidForStringSetsGuid() {
		$this->subject->setGuid('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'guid',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDate()
		);
	}

	/**
	 * @test
	 */
	public function setDateForDateTimeSetsDate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'date',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStartReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getStart()
		);
	}

	/**
	 * @test
	 */
	public function setStartForIntegerSetsStart() {
		$this->subject->setStart(12);

		$this->assertAttributeEquals(
			12,
			'start',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDurationReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getDuration()
		);
	}

	/**
	 * @test
	 */
	public function setDurationForIntegerSetsDuration() {
		$this->subject->setDuration(12);

		$this->assertAttributeEquals(
			12,
			'duration',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRoomReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getRoom()
		);
	}

	/**
	 * @test
	 */
	public function setRoomForStringSetsRoom() {
		$this->subject->setRoom('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'room',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSlugReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSlug()
		);
	}

	/**
	 * @test
	 */
	public function setSlugForStringSetsSlug() {
		$this->subject->setSlug('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'slug',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSubtitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSubtitle()
		);
	}

	/**
	 * @test
	 */
	public function setSubtitleForStringSetsSubtitle() {
		$this->subject->setSubtitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'subtitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTrackReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTrack()
		);
	}

	/**
	 * @test
	 */
	public function setTrackForStringSetsTrack() {
		$this->subject->setTrack('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'track',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForStringSetsType() {
		$this->subject->setType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLanguageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setLanguageForStringSetsLanguage() {
		$this->subject->setLanguage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'language',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAbstractReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAbstract()
		);
	}

	/**
	 * @test
	 */
	public function setAbstractForStringSetsAbstract() {
		$this->subject->setAbstract('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'abstract',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() {
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinksReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLinks()
		);
	}

	/**
	 * @test
	 */
	public function setLinksForStringSetsLinks() {
		$this->subject->setLinks('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'links',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPersonsReturnsInitialValueForPerson() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPersons()
		);
	}

	/**
	 * @test
	 */
	public function setPersonsForObjectStorageContainingPersonSetsPersons() {
		$person = new Tx_FrabIntegration_Domain_Model_Person();
		$objectStorageHoldingExactlyOnePersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePersons->attach($person);
		$this->subject->setPersons($objectStorageHoldingExactlyOnePersons);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePersons,
			'persons',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPersonToObjectStorageHoldingPersons() {
		$person = new Tx_FrabIntegration_Domain_Model_Person();
		$personsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$personsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($person));
		$this->inject($this->subject, 'persons', $personsObjectStorageMock);

		$this->subject->addPerson($person);
	}

	/**
	 * @test
	 */
	public function removePersonFromObjectStorageHoldingPersons() {
		$person = new Tx_FrabIntegration_Domain_Model_Person();
		$personsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$personsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($person));
		$this->inject($this->subject, 'persons', $personsObjectStorageMock);

		$this->subject->removePerson($person);

	}
}
