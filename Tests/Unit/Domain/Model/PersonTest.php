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
 * Test case for class \Eike\FrabIntegration\Domain\Model\Person.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Eike Starkmann <eikestarkmann@web.de>
 */
class PersonTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Eike\FrabIntegration\Domain\Model\Person
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Eike\FrabIntegration\Domain\Model\Person();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForStringSetsImage() {
		$this->subject->setImage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFullPublicNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getFullPublicName()
		);
	}

	/**
	 * @test
	 */
	public function setFullPublicNameForStringSetsFullPublicName() {
		$this->subject->setFullPublicName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fullPublicName',
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
	public function getEventsReturnsInitialValueForEvent() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getEvents()
		);
	}

	/**
	 * @test
	 */
	public function setEventsForObjectStorageContainingEventSetsEvents() {
		$event = new \Eike\FrabIntegration\Domain\Model\Event();
		$objectStorageHoldingExactlyOneEvents = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneEvents->attach($event);
		$this->subject->setEvents($objectStorageHoldingExactlyOneEvents);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneEvents,
			'events',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addEventToObjectStorageHoldingEvents() {
		$event = new \Eike\FrabIntegration\Domain\Model\Event();
		$eventsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$eventsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($event));
		$this->inject($this->subject, 'events', $eventsObjectStorageMock);

		$this->subject->addEvent($event);
	}

	/**
	 * @test
	 */
	public function removeEventFromObjectStorageHoldingEvents() {
		$event = new \Eike\FrabIntegration\Domain\Model\Event();
		$eventsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$eventsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($event));
		$this->inject($this->subject, 'events', $eventsObjectStorageMock);

		$this->subject->removeEvent($event);

	}
}
