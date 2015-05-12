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
 * Test case for class \Eike\FrabIntegration\Domain\Model\Day.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Eike Starkmann <eikestarkmann@web.de>
 */
class DayTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Eike\FrabIntegration\Domain\Model\Day
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Eike\FrabIntegration\Domain\Model\Day();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getIndexReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getIndex()
		);
	}

	/**
	 * @test
	 */
	public function setIndexForIntegerSetsIndex() {
		$this->subject->setIndex(12);

		$this->assertAttributeEquals(
			12,
			'index',
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
	public function getDayStartReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDayStart()
		);
	}

	/**
	 * @test
	 */
	public function setDayStartForDateTimeSetsDayStart() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDayStart($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'dayStart',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDayEndReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDayEnd()
		);
	}

	/**
	 * @test
	 */
	public function setDayEndForDateTimeSetsDayEnd() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDayEnd($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'dayEnd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRoomsReturnsInitialValueForRoom() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getRooms()
		);
	}

	/**
	 * @test
	 */
	public function setRoomsForObjectStorageContainingRoomSetsRooms() {
		$room = new \Eike\FrabIntegration\Domain\Model\Room();
		$objectStorageHoldingExactlyOneRooms = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneRooms->attach($room);
		$this->subject->setRooms($objectStorageHoldingExactlyOneRooms);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneRooms,
			'rooms',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addRoomToObjectStorageHoldingRooms() {
		$room = new \Eike\FrabIntegration\Domain\Model\Room();
		$roomsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$roomsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($room));
		$this->inject($this->subject, 'rooms', $roomsObjectStorageMock);

		$this->subject->addRoom($room);
	}

	/**
	 * @test
	 */
	public function removeRoomFromObjectStorageHoldingRooms() {
		$room = new \Eike\FrabIntegration\Domain\Model\Room();
		$roomsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$roomsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($room));
		$this->inject($this->subject, 'rooms', $roomsObjectStorageMock);

		$this->subject->removeRoom($room);

	}
}
